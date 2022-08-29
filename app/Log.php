<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['user_id', 'address'];
    
    public function user() {
        $this->belongsTo(User::class);
    }
}
