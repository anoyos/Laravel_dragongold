<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = ['user_id', 'transaction_id', 'uplink', 'level', 'status'];
    
    
    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function uplink() {
        return $this->belongsTo(User::class, 'uplink');
    }
    
}
