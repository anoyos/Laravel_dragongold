<?php

namespace App\Listeners;

use App\Events\WithdrawAuto;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\WithdrawProcess as WithdrawNotification;

class WithdrawProcess
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
     * @param  WithdrawAuto  $event
     * @return void
     */
    public function handle(WithdrawAuto $event)
    {
        $transaction = $event->transaction;
        $event->user->notify(new WithdrawNotification($transaction->created_at, $event->currency,$transaction->amount));
    }
}
