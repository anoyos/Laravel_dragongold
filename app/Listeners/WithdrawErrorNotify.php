<?php

namespace App\Listeners;

use App\Events\WithdrawError;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WithdrawErrorNotify
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
     * @param  WithdrawError  $event
     * @return void
     */
    public function handle(WithdrawError $event)
    {
        //
    }
}
