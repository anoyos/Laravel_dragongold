<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['question', 'answer','type', 'language_id'];

    public function language(){
		return $this->belongsTo(Language::class);
	}
}
