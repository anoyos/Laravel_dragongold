<?php

namespace App\Listeners;

use App\Events\Deposit;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\InvestDeposit;
use App\Notifications\ReinvestDeposit;
class DepositCreateNotification
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
     * @param  Deposit  $event
     * @return void
     */
    public function handle(Deposit $event)
    {
        if($event->type == 'invest'){
            $event->user->notify(new InvestDeposit($event->transaction, $event->currency, $event->amount));
        }elseif ($event->type == 'reinvest') {
            $event->user->notify(new ReinvestDeposit($event->transaction, $event->currency, $event->amount));
        }
    }
}
