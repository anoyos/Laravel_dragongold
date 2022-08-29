<?php

namespace App\Listeners;

use App\Events\WithdrawApproval;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\AdminWithdrawApproval as WithdrawNotification;
use App\Admin;
class AdminWithdrawApproval
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
    public function handle(WithdrawApproval $event)
    {
        $admins = Admin::all();
        foreach($admins as $admin){
            $admin->notify(new WithdrawNotification($event->transaction,$event->user , $event->currency));  
        }
    }
}
