<?php

namespace App\Listeners;

use App\Events\DepositComplete;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\AdminDepositComplete;
use App\Admin;
class AdminDepositCompleteNotification
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
        $admins = Admin::all();
        foreach($admins as $admin){
            $admin->notify(new AdminDepositComplete($event->deposit->transaction));  
        }
    }
}
