<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = ['user_id', 'transaction_id', 'type', 'reference', 'address', 'confirmations','confirmations_needed','hash', 'status'];
    
    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function credits(){
    	return $this->hasMany(Credit::class);
    }
}
