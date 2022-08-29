<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\DeleteExpiredDeposit;
use App\Jobs\CheckDeposit;
use App\Jobs\UpdateRates;
use App\Jobs\CheckIncompleteDeposit;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->job(new DeleteExpiredDeposit())->twiceDaily();
        $schedule->job(new CheckDeposit())->everyTenMinutes();
        $schedule->job(new UpdateRates())->everyThirtyMinutes();
        $schedule->job(new CheckIncompleteDeposit())->everyThirtyMinutes();
        $schedule->command('view:clear')->everyTenMinutes(); // clear view files often
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
