<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{	
	protected $fillable = ['title', 'slug', 'body', 'image', 'language_id'];

	public function language(){
		return $this->belongsTo(Language::class);
	}

    public function getRouteKeyName(){
    	return 'slug';
    }
}
