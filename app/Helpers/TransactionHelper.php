<?php

namespace App\Helpers;
use App\Transaction;
use App\User;
class TransactionHelper {
    
    
    public static function totalInvested(User $user) {
        $sum = 0;
        $txs = $user->transactions()->where([['type','deposit'],['status', 'active']])->with('currency')->get();
        foreach ($txs as $tx){
            $sum += round($tx->amount * $tx->currency->usdrate, 2);
        }
        return $sum;
    }

    public static function totalWithdraw(User $user) {
        $sum = 0;
        $txs = $user->transactions()->where([['type','withdraw'],['status', 'active']])->with('currency')->get();
        foreach ($txs as $tx){
            $sum += round($tx->amount * $tx->currency->usdrate, 2);
        }
        return $sum;
    }

    public static function totalBalance(User $user) {
    	$sum = 0;
        $balances = $user->balances()->with('currency')->get();
        foreach ($balances as $bal){
            $sum += round($bal->amount * $bal->currency->usdrate, 2);
        }
        return $sum;
    }
}
