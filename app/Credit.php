<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $fillable = ['user_id', 'transaction_id', 'deposit_id', 'status'];
    
    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }
    
    public function deposit() {
        return $this->belongsTo(Deposit::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
