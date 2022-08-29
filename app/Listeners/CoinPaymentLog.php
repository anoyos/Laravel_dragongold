<?php

namespace App\Listeners;

use App\Events\CoinPaymentError;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\CoinPaymentError as CoinPaymentMail;
class CoinPaymentLog
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
     * @param  CoinPaymentError  $event
     * @return void
     */
    public function handle(CoinPaymentError $event)
    {
        Mail::to($event->email)->send(new CoinPaymentMail($event->subject, $event->message));
    }
}
