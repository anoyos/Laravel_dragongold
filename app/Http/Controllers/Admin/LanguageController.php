<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Language;

class LanguageController extends Controller
{
    public function index(){
    	$breadcrumbs = [
    	    ['link' => "/admin/dashboard", 'name' => "Dashboard"],
    	    ['link' => "/admin/language", 'name' => "All Languages"]
    	];

    	$languages = Language::all();

    	return view('admin.language.index', compact('breadcrumbs', 'languages'));
    }

    public function store(Request $request){

    	$request->validate([
    		'name' => 'required|string',
    		'code' => 'required|string',
    	]);
    	
    	$language = new Language();

    	$language->name = $request->name;
    	$language->code = $request->code;
    	
    	$language->save();

    	Session::flash('success', 'Language added succesfully');

	  	return redirect()->back();
    }
}
