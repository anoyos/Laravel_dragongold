<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = ['transaction_id', 'user_id', 'address','status', 'hash','reference'];

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
