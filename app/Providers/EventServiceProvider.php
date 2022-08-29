<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Listeners\SendEmailVerifiedNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Verified::class => [
            SendEmailVerifiedNotification::class,
        ],
        'App\Events\Deposit' => [
            'App\Listeners\DepositCreateNotification',
        ],
        'App\Events\CoinPaymentError' => [
            'App\Listeners\CoinPaymentLog',
        ],
        'App\Events\WithdrawError' => [
            'App\Listeners\WithdrawLog',
            'App\Listeners\WithdrawErrorNotify',
        ],
        'App\Events\DailyCredit' => [
            'App\Listeners\DailyCreditNotification',
        ],
        'App\Events\DepositComplete' => [
            'App\Listeners\DepositCompleteNotification',
            'App\Listeners\AdminDepositCompleteNotification',
            'App\Listeners\DepositReferrerBonus',
            'App\Listeners\DepositTransactionFee',
        ],
        'App\Events\WithdrawInit' => [
            'App\Listeners\WithdrawInit',
            'App\Listeners\AdminWithdrawInit',
        ],
        'App\Events\WithdrawAuto' => [
            'App\Listeners\WithdrawProcess',
            'App\Listeners\AdminWithdrawProcess',
        ],
        'App\Events\WithdrawApproval' => [
            'App\Listeners\WithdrawApproval',
            'App\Listeners\AdminWithdrawApproval',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
