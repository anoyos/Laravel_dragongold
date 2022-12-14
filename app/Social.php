<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillable = ['user_id', 'name'];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
