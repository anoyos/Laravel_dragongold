<?php
namespace App\Http\View\Composers;
use Illuminate\View\View;
use App\Log;
use Auth;
use App\Language;
class NavComposer {
    
    
    public function compose(View $view) {
        $languages = Language::all();
        $lastLog = Log::where('user_id', Auth::id())->orderBy('created_at', 'desc')->first();
        $view->with('lastLog', $lastLog);
        $view->with('languages', $languages);
    }
}
