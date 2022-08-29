<?php

namespace App\Listeners;

use App\Events\DailyCredit;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\CreditPaid;

class DailyCreditNotification
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
     * @param  DailyCredit  $event
     * @return void
     */
    public function handle(DailyCredit $event)
    {
        $event->credit->user->notify(new CreditPaid($event->credit));
    }
}
