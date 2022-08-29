<?php
namespace App\Http\View\Composers;
use Illuminate\View\View;
use App\Language;
class IndexNavComposer {
    
    
    public function compose(View $view) {
        $languages = Language::all();
        $view->with('languages', $languages);
    }
}
