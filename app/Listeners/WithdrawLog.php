<?php

namespace App\Listeners;

use App\Events\WithdrawError;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\WithdrawErrorMail;
use App\Admin;
use App\Notifications\WithdrawError as WithdrawNotification;
class WithdrawLog
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
        Mail::to($event->email)->send(new WithdrawErrorMail($event->subject, $event->message));
        $admins = Admin::all();
        foreach($admins as $admin){
            $admin->notify(new WithdrawNotification($event->subject, $event->message));  
        }
    }
}
