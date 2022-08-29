<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Jobs\ProcessIncompleteDeposit;
use CoinPayments\CoinpaymentsAPI;
use App\Deposit;

class CheckIncompleteDeposit implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        Deposit::where('status', 'pending')->whereNull('assisted')
                ->chunk(100, function($deposits) {
                    if ($deposits) {
                        $coinPayments = new CoinpaymentsAPI(config('services.coinpayments.privatekey'), config('services.coinpayments.publickey'));
                        foreach ($deposits as $deposit) {
                            $response = $coinPayments->GetTxInfoSingle($deposit->reference);
                            if ($response['error'] == 'ok') {
                                $result = $response['result'];
                                // status is 0, amount is not fully received and received is not zero
                                if ($result['status'] == 0 && $result['received'] > 0 && $result['amount'] !== $result['received']) {
                                    ProcessIncompleteDeposit::dispatchNow($deposit, $coinPayments, $result);
                                }
                            }
                        }
                    }
                });
    }

}
