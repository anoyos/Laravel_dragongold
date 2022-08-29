<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['name', 'code'];

    // protected $primaryKey = 'code';

    public function news(){
    	return $this->hasMany('App\News');
    }

    public function pageSections(){
        return $this->hasMany(Section::class);
    }

    public function faq(){
    	return $this->hasMany('App\Faq');
    }

    public static function getId($code){
        return self::where('code', $code)->pluck('id')->first();
    }
}
