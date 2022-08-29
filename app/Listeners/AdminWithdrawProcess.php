<?php

namespace App\Listeners;

use App\Events\WithdrawAuto;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\AdminWithdrawProcess as WithdrawNotification;
use App\Admin;
class AdminWithdrawProcess
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
        $admins = Admin::all();
        foreach($admins as $admin){
            $admin->notify(new WithdrawNotification($event->transaction,$event->user , $event->currency));  
        }
    }
}
