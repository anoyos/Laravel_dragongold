<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
   protected $fillable = ['user_id', 'currency_id', 'wallet', 'amount'];

   public function user(){
   	return $this->belongsTo(User::class);
   }

   public function currency(){
	return $this->belongsTo(Currency::class);
   }
}
