<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'content', 'language_id', 'page_id'];
    
    
    public function language() {
        $this->belongsTo(Language::class);
    }
    
    public function page() {
        $this->belongsTo(Page::class);
    }
}
