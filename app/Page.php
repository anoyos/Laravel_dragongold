<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'content'];
    
    public function sections() {
        return $this->hasMany('App\Section');
    }

    public function getRouteKeyName(){
    	return 'slug';
     }

}
