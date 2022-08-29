<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Transaction;
use Blade;
use App\User;
use Carbon\Carbon;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
        $totalInvested = 0;
        $totalPaid = 0;
        $deals = 0;
         
        $transactions = Transaction::whereIn('type', ['deposit', 'credit', 'referral'])
                ->where('status', 'active')->with('currency')->get();
        
        foreach($transactions as $trans){
            if($trans->type == 'deposit'){
                $totalInvested += $trans->amount  * $trans->currency->usdrate;
                $deals++;
            }else{
                $totalPaid += $trans->amount  * $trans->currency->usdrate;
            }
        }
        
        Blade::directive('totalInvested', function () use ($totalInvested) {
            return "<?php echo '$ ' . number_format($totalInvested, 2); ?>";
        });
        Blade::directive('totalPaid', function () use ($totalPaid) {
            return "<?php echo '$ ' . number_format($totalPaid, 2); ?>";
        });
        Blade::directive('deals', function () use ($deals) {
            return "<?php echo $deals; ?>";
        });
        Blade::directive('totalInvestors', function () {
            $investors = User::count();
            return "<?php echo $investors; ?>";
        });
        Blade::directive('daysOnline', function () {
            $from = Carbon::createFromDate(config('global.launch_date'))->diffInDays(Carbon::now());
            return "<?php echo $from; ?>";
        });
        
        Blade::directive('usd', function ($money) {
            return "<?php echo '$ ' . number_format($money, 2); ?>";
        });
        
         View::composer('homepage/_partials/nav', 'App\Http\View\Composers\IndexNavComposer');
         View::composer('users/_partials/nav', 'App\Http\View\Composers\NavComposer');
         View::composer('users/_partials/header', 'App\Http\View\Composers\HeaderComposer');
         View::composer('homepage/_partials/header', 'App\Http\View\Composers\IndexHeaderComposer');
         View::composer('users/_partials/sidebar', 'App\Http\View\Composers\SidebarNewsComposer');
         View::composer('admin/panels/navbar', 'App\Http\View\Composers\AdminNavComposer');
    }
}
