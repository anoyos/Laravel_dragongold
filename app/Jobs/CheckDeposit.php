<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Deposit;
use Carbon\Carbon;
use App\Jobs\DailyReturn;

class CheckDeposit implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        Deposit::where('status', 'active')
            ->where('updated_at', '<', Carbon::now()->subDay())
            ->chunk(100, function($deposits) {
                if($deposits){
                    foreach ($deposits as $deposit) {
                        DailyReturn::dispatch($deposit);
                    }
                }
            });
    }

}
