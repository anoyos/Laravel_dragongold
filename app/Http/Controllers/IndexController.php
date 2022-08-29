<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use App\Language;
use App\Page;
use App\Faq;
use Auth;
use Carbon\Carbon;
use App\News;

class IndexController extends Controller {

    
    protected function getSections(Page $page) {
        // fecth the default language (EN)
        $secs = $page->sections()->where('language_id', 1)->get();
        $sections = [];
        foreach ($secs as $sec){
            $sections[$sec->name] = $sec->content;
        }
        $localeid = session('localeid', 1); // en
        
        // fetch locale sections if not EN
        if($localeid !== 1){
            $secs = $page->sections()->where('language_id', $localeid)->get();
            // replace the EN version with the translations available
            foreach ($secs as $sec){
                $sections[$sec->name] = $sec->content;
            }
        }
        return $sections;
    }
    
    public function index() {
        $page = Page::where('slug', 'home')->first();
        $sections = $this->getSections($page);

        return view('homepage.layouts.home', compact('sections'));
    }
    
    public function about() {
        $page = Page::where('slug', 'about')->first();
        $sections = $this->getSections($page);

        return view('homepage.layouts.about', compact('sections'));
    }

    public function investors() {
        $page = Page::where('slug', 'investors')->first();
        $sections = $this->getSections($page);
        return view('homepage.layouts.investors', compact('sections'));
    }

    public function affiliates() {
        $page = Page::where('slug', 'affiliates')->first();
        $sections = $this->getSections($page);

        return view('homepage.layouts.affiliates', compact('sections'));
    }

    public function webinars() {
        $page = Page::where('slug', 'webinars')->first();
        $sections = $this->getSections($page);

        return view('homepage.layouts.webinars', compact('sections'));
    }

    public function bounty() {
        $page = Page::where('slug', 'bounty')->first();
        $sections = $this->getSections($page);

        return view('homepage.layouts.bounty', compact('sections'));
    }

    public function faq() {
        $questions = [];
        $page = Page::where('slug', 'faq')->first();
        $sections = $this->getSections($page);
        $localeid = session('localeid', 1); // en

        $faqs = Faq::where('language_id', $localeid)->get();

        foreach ($faqs as $faq) {
            $questions[$faq->type][] = $faq;
        }

        return view('homepage.layouts.faq', compact('sections', 'questions'));
    }

    public function news() {
        $page = Page::where('slug', 'news')->first();
        $sections = $this->getSections($page);

        $localeid = session('localeid', 1);

        $all = News::where('language_id', $localeid)->orderBy('id','desc')->limit(10)->get();


        return view('homepage.layouts.news', compact('sections', 'all'));
    }

    public function showNews(News $news)
    {
        $page = Page::where('slug', 'news')->first();
        $sections = $this->getSections($page);

        $localeid = session('localeid', 1);
        
        $all = News::where('language_id', $localeid)->orderBy('id','desc')->get();

        $new = $news;

        return view('homepage.layouts.news', compact('all', 'new', 'sections'));
    }

    public function referrer($username) {
        Cookie::queue('referrer', $username, 60 * 24 * 30);
        return redirect()->route('index');
    }

    public function lang($locale) {
        session()->put('locale', $locale);
        Cookie::queue('locale', $locale, 60 * 24 * 30);
        $localeid = Language::where('code', $locale)->first()->id;
        session()->put('localeid', $localeid);
        
        if(Auth::check()){
            Auth::user()->language_id = $localeid;
            Auth::user()->save();
        }
        
        return redirect()->back();
    }

    public function launch(){
        $now = now();
        DB::table('settings')->insert(['key' => 'launch_date', 'value' => $now]);
    }

}
