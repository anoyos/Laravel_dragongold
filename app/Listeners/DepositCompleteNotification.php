<?php

namespace App\Listeners;

use App\Events\DepositComplete;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\DepositPaid;
class DepositCompleteNotification
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
        $transaction->user->notify(new DepositPaid($event->deposit, $transaction->currency->name, $transaction->amount));
    }
}
