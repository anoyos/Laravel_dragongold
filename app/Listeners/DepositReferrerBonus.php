<?php

namespace App\Listeners;

use App\Events\DepositComplete;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Transaction;
use App\Referral;
use App\Balance;
use App\Notifications\ReferralPaid;
class DepositReferrerBonus {

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param  DepositComplete  $event
     * @return void
     */
    public function handle(DepositComplete $event) {
        $user = $event->deposit->transaction->user;
        $amount = $event->deposit->transaction->amount;
        $currency = $event->deposit->transaction->currency;
        $current = $user->referrer()->first();
        $i = 1;
        while (!empty($current) && $i <= 5) {
            $bonus = config('global.affiliate_l' . $i);
            $win = $amount * $bonus / 100;

            $transaction = Transaction::create([
                        'user_id' => $current->id,
                        'currency_id' => $currency->id,
                        'amount' => $win,
                        'type' => 'referral',
                        'description' => "Referral Bonus of $win {$currency->symbol} on {$user->name} $amount {$currency->symbol} Deposit [$bonus %]",
                        'status' => 'active',
            ]);
            Referral::create([
                'user_id' => $user->id,
                'transaction_id' => $transaction->id,
                'uplink' => $current->id,
                'level' => $i,
                'status' => 'active',
            ]);

            $balance = Balance::where('user_id', $current->id)
                            ->where('currency_id', $currency->id)->first();
            $balance->amount += $win;
            $balance->save();
            
            $current->notify(new ReferralPaid($transaction, $user->name, $currency->name));


            $current = $current->referrer()->first();
            $i++; // to limit uplink to 5
        }
    }

}
