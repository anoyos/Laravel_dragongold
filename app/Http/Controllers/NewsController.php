<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Language;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*Create a helper function that get lang name by id*/
        //$current_language = session()->get('locale') == null ? lang_id('EN') : lang_id(session()->get('locale'));
        $localeid = session('localeid', 1);

        $all = News::where('language_id', $localeid)->orderBy('id','desc')->limit(10)->get();

        return view('users.news', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {

        $current_language = lang_id(session()->get('locale', 'en'));
        
        $all = News::where('language_id', $current_language)->orderBy('id','desc')->get();

        $new = $news;

        return view('users.news', compact('all', 'new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
