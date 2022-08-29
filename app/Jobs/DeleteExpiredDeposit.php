<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Deposit;
use Carbon\Carbon;

class DeleteExpiredDeposit implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $deposits = Deposit::where('status', 'pending')->where('expired_at', '<', Carbon::now())->with('transaction')->get();
        foreach($deposits as $deposit){
            $deposit->status = 'canceled';
            $deposit->transaction->status = 'canceled';
            
            $deposit->save();
            $deposit->transaction->save();
        }
    }
}
