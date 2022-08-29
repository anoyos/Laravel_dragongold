<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Transaction;
use App\Deposit;
use App\Credit;
use App\Balance;
use Carbon\Carbon;

use App\Events\DailyCredit;

class DailyReturn implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $deposit;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Deposit $deposit) {
        $this->deposit = $deposit;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        $user = $this->deposit->user_id;
        $otransaction = $this->deposit->transaction;
        $recentCredit = Credit::where('user_id', $user)
                        ->where('deposit_id', $this->deposit->id)
                        ->latest()->first();

        $now = Carbon::now();
        if ($recentCredit && $recentCredit->created_at->diffInHours($now) < 24) {
            return false;
        }

        $roi = $now->isWeekend() ? config('global.profit_weekend') : config('global.profit_main');
        $amount = $otransaction->amount * $roi / 100;
        $currency = $otransaction->currency_id;

        $transaction = Transaction::create([
            'user_id' => $user,
            'currency_id' => $currency,
            'amount' => $amount,
            'type' => 'credit',
            'description' => "Daily Profit on Deposit Received",
            'status' => 'active',
        ]);

        $credit = Credit::create([
            'user_id' => $user,
            'transaction_id' => $transaction->id,
            'deposit_id' => $this->deposit->id,
            'status' => 'active'
        ]);

        $balance = Balance::where('user_id', $user)
                        ->where('currency_id', $currency)->first();
        $balance->amount += $amount;
        $balance->save();

        // update the deposit table as well, to reflect changes...
        $this->deposit->expired_at = $now;
        $this->deposit->save();
        
        event(new DailyCredit($credit));
    }

}
