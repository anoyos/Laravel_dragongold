<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Language;
use App\Section;
use Session;

class PageController extends Controller
{
    public function index(){
    	$breadcrumbs = [
    	    ['link' => "/admin/dashboard", 'name' => "Dashboard"],
    	    ['link' => "/admin/page", 'name' => "All Pages"]
    	];

    	$pages = Page::all();

    	return view('admin.sections.index', compact('breadcrumbs', 'pages'));
    }

    public function show(Page $page){
    	$breadcrumbs = [
    	    ['link' => "/admin/dashboard", 'name' => "Dashboard"],
    	    ['link' => "/admin/page", 'name' => $page->title." Page"]
    	];


    	$languages = Language::all();
    	$current = 'English';
    	return view('admin.sections.page', compact('breadcrumbs', 'languages','page', 'current'));
    }

    public function store(Request $request){
    	//validate input
    	$request->validate([
    		'content' => "required|string"
    	]);
    	$page_id = $request->input('page');
		$page = Page::find($page_id)->first();

    	$language_id = $request->input('language');
    	$name = $request->input('name');
    	//check if section already has same section name for a page and same language
    	$check = Section::where([['name', '=', $name],['page_id', '=', $page_id], ['language_id', '=', $language_id]])->count();

    	//if return is > 0
    	if($check > 0){
    		Session::flash('error', "Section exist for this page, use the edit button");
    		return redirect()->route('admin.pages.show', $page);
    	}

    	//if false, save the input into db
    	$section = new Section();

    	$section->create([
    		'name' => $name,
    		'content' => $request->content,
    		'language_id' => $language_id,
    		'page_id' => $page_id
    	]);

    	Session::flash('success', "Section added successfully");
		return redirect()->route('admin.pages.show', $page);

    }

    public function update(Request $request){
    	$section_id = $request->input('section_id');

    	$section = Section::find($section_id);
    	$page = Page::find($section->page_id);

    	$section->update([
    		'name' => $request->input('name'),
    		'content' => $request->input('content')
    	]);

    	Session::flash('success', 'Page Content Updated Succesfully');

    	return redirect()->route('admin.pages.show', $page);
    }

}
