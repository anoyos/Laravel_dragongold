<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Language;
use Carbon\Carbon;
use Session;

class NewsController extends Controller
{
    public function index(){
    	$breadcrumbs = [
    	    ['link' => "/admin/dashboard", 'name' => "Dashboard"],
    	    ['link' => "/admin/news", 'name' => "News"]
    	];

    	$languages = Language::with('news')->get();
    	$current = 'English';

    	return view('admin.news.index', compact('breadcrumbs', 'languages','current'));
    }

    public function store(Request $request){

    	$upload_path = $this->upload($request);

    	$slug=$this->slug($request->title);

    	$news = new News();

    	$news->title = $request->title;
    	$news->slug = $slug;
    	$news->body = $request->body;
    	$news->language_id = $request->language;
    	$news->image = $upload_path;

    	$news->save();

		Session::flash('success', 'News added succesfully');

	  	return redirect()->back();
    }

    public function update(Request $request){

    	$slug=$this->slug($request->title);
    	$news_id = $request->news_id;

    	$news = News::find($news_id);

    	$news->title = $request->title;
    	$news->body = $request->body;
    	$news->slug = $slug;
    	if($upload_path = $this->upload($request)){
    		$news->image = $upload_path;
    	}
    	$news->save();

    	Session::flash('success', 'News update succesful');

	  	return redirect()->back();
    }

    public function slug($string){
    	return preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    }

    public function upload(Request $request){
    	if($request->hasFile('file')){
    		$time = Carbon::now();

			// Requesting the file from the form 
	        $image = $request->file;

	        //Getting the extension of the file
	        $extension = $image->getClientOriginalExtension();

	         //Creating the directory
            $directory = $time->format('Y') . '/'. $time->format('m');

            //Creating the file name:
            $filename = str_random(5).$time->format('d').rand(1, 9).$time->format('h').".".$extension;

            //this is ou upload main function, storing the image in the storage that named upload
            $upload_path = $image->storeAs($directory, $filename, 'news');

            return $upload_path;
    	}else{
    		return false;
    	}
    }
}
