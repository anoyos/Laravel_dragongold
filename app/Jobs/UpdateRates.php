<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use CoinPayments\CoinpaymentsAPI;
use App\Currency;
class UpdateRates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $coinPayments = new CoinpaymentsAPI(config('services.coinpayments.privatekey'), config('services.coinpayments.publickey'));
        echo $coinPayments->updateCurrencyRates(Currency::all());
    }
}
