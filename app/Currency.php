<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Currency extends Model
{
    protected $fillable = ['name', 'symbol', 'usdrate', 'status'];

    public function balances(){
    	return $this->hasMany('App\Balance');
    }
    
    public function sname() {
        return strtolower(str_replace(' ', '_', $this->name));
    }
    public function code() {
        return strtolower(str_replace(' ', '_', $this->symbol));
    }
}
