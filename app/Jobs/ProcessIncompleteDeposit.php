<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Deposit;
use CoinPayments\CoinpaymentsAPI;
use App\Notifications\DepositIncomplete;
use App\Events\CoinPaymentError;
class ProcessIncompleteDeposit implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $deposit;
    protected $result;
    protected $api;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Deposit $deposit, CoinpaymentsAPI $api, $result) {
        $this->deposit = $deposit;
        $this->result = $result;
        $this->api = $api;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        $transaction = $this->deposit->transaction;
        $topay = $this->result['amountf'] - $this->result['receivedf'];
        
        if($topay < 0.006){ // use currency minimum later
            $topay = 0.006;
        }
        
        if($transaction->amount != $this->result['amountf']){ // fraud detection
            // 
            event(new CoinPaymentError('CoinPayment Incomplete Transaction Notification',"amount doesn't match for #{$this->deposit->reference} ", config('services.coinpayments.mail')));
            return false;
        }
        if($this->deposit->address != $this->result['payment_address']){ // fraud detection
            // 
            event(new CoinPaymentError('CoinPayment Incomplete Transaction Notification',"address does not match for #{$this->deposit->reference}", config('services.coinpayments.mail')));
            return false;
        }
        
        if($topay >= $this->result['amountf'] /2 ){ // fraud detection
            // check some stuffs here, prevent fraud
            $gg = $this->result['amountf'] /2;
            event(new CoinPaymentError('CoinPayment Incomplete Transaction Notification',"Amount to Pay {$topay} is high ({$gg}) for #{$this->deposit->reference}", config('services.coinpayments.mail')));
            return false;
        }
        
        

        $withdrawRequest = $this->api->CreateWithdrawal([
            'amount' => $topay, 'currency' => $this->result['coin'],
            'address' => $this->result['payment_address'],
            'ipn_url' => route('ipn.withdraw'), 'auto_confirm' => 1, 'add_tx_fee' => 1
        ]);
        
        if ($withdrawRequest['error'] == 'ok') {
            $transaction->user->notify(new DepositIncomplete($transaction, $this->result['receivedf'], $this->result['coin']));
            $transaction->amount = $transaction->amount - $topay;
            $transaction->save();
            $this->deposit->assisted = $topay;
            $this->deposit->save();
            event(new CoinPaymentError('CoinPayment Incomplete Transaction Notification',
                    "$topay {$this->result['coin']} successful sent to complete transaction process for #{$this->deposit->reference}", config('services.coinpayments.mail')));
        }else{
            $error = "Unable to complete transaction of {$transaction->amount} {$this->result['coin']} for "
                    . "{$transaction->user->name}, Transaction #{$this->deposit->reference} | CP Message: ";
            $error .= json_encode($withdrawRequest);
            event(new CoinPaymentError('CoinPayment Incomplete Transaction Notification', $error, config('services.coinpayments.mail')));
        }
        
    }

}
