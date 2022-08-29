<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\WithdrawInit as WithdrawNotification;
use App\Events\WithdrawInit as WithdrawEvent;

class WithdrawInit {

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param  WithdrawInit  $event
     * @return void
     */
    public function handle(WithdrawEvent $event) {
        $transaction = $event->transaction;
        $event->user->notify(new WithdrawNotification($transaction->created_at, $event->currency,$transaction->amount));
    }

}
