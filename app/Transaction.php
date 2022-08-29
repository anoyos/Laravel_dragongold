<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id','currency_id','amount','description','type','status'];
    
    public function deposit() {
        return $this->hasOne(Deposit::class);
    }
    public function withdraw() {
        return $this->hasOne(Withdraw::class);
    }
    
    public function referral() {
        return $this->hasOne(Referral::class);
    }

    public function credit() {
        return $this->hasOne(Credit::class);
    }
    
    public function currency() {
        return $this->belongsTo(Currency::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
