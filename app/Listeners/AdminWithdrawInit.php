<?php

namespace App\Listeners;

use App\Events\WithdrawInit;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\AdminWithdrawInit as WithdrawNotification;
use App\Admin;
class AdminWithdrawInit
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
     * @param  WithdrawInit  $event
     * @return void
     */
    public function handle(WithdrawInit $event)
    {
        $admins = Admin::all();
        foreach($admins as $admin){
            $admin->notify(new WithdrawNotification($event->transaction,$event->user , $event->currency));  
        }
    }
}
