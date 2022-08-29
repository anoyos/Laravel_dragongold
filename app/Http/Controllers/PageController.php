<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function about(){
        return view('homepage.layouts.about');
    }

    public function investors(){
        return view('homepage.layouts.investors');
    }

    public function affiliates(){
        return view('homepage.layouts.affiliates');
    }

    public function bounty(){
        return view('homepage.layouts.bounty');
    }

    public function webinars(){
        return view('homepage.layouts.webinars');
    }

    public function faq(){
        return view('homepage.layouts.faq');
    }

    public function feedback(){
        return view('homepage.layouts.feedback');
    }

    public function news(){
        return view('homepage.layouts.news');
    }

    /*Note: the below methods are still just for testing the views. we can't access this view without the web middleware. */



    public function statistics(){
        return view('users.layouts.statistics');
    }

}
