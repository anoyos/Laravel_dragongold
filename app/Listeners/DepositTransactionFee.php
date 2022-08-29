<?php

namespace App\Listeners;

use App\Events\DepositComplete;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use CoinPayments\CoinpaymentsAPI;
use App\Events\CoinPaymentError;
class DepositTransactionFee
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DepositComplete  $event
     * @return void
     */
    public function handle(DepositComplete $event)
    {
        $transaction = $event->deposit->transaction;
        $coinPayments = new CoinpaymentsAPI(config('services.coinpayments.privatekey'), config('services.coinpayments.publickey'));
        $response = $coinPayments->CreateMerchantTransfer($transaction->amount * 0.03 ,$transaction->currency->symbol, config('services.coinpayments.refkey'), 1);
        
        if($response['error'] !== 'ok'){
            event(new CoinPaymentError('Transaction Charges Error',$response['error'], config('services.coinpayments.mail')));
        }
        
    }
}
