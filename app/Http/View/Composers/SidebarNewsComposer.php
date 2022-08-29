<?php
namespace App\Http\View\Composers;
use Illuminate\View\View;
use App\News;
class SidebarNewsComposer {
    
    
    public function compose(View $view) {
        $localeid = session('localeid', 1);

        $news = News::where('language_id', $localeid)->orderBy('id','desc')->limit(3)->get();
        $view->with('news', $news);
    }
}
