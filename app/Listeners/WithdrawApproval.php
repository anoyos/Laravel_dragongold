<?php

namespace App\Listeners;

use App\Events\WithdrawApproval as WithdrawEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\WithdrawApproval as WithdrawNotification; 

class WithdrawApproval
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
     * @param  WithdrawApproval  $event
     * @return void
     */
    public function handle(WithdrawEvent $event)
    {
        $transaction = $event->transaction;
        $event->user->notify(new WithdrawNotification($transaction->created_at, $event->currency,$transaction->amount));
    }
}
