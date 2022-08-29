<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Language;
use App\Faq;
use Session;

class FaqController extends Controller
{
    public function index(){
    	$breadcrumbs = [
    	    ['link' => "/admin/dashboard", 'name' => "Dashboard"],
    	    ['link' => "/admin/faqs", 'name' => "Faqs"]
    	];

    	$languages = Language::with('faq')->get();
    	$current = 'English';

    	return view('admin.faqs.index', compact('breadcrumbs', 'languages','current'));
    }

    public function store(Request $request){

    	$valids = $request->validate([
    		'question' => 'required',
    		'answer' => 'required',
    		'type' => 'required'
    	]);

    	$faq = new Faq();

    	$faq->question = $request->question;
    	$faq->answer = $request->answer;
    	$faq->type = $request->type;
    	$faq->language_id = $request->language;

    	$faq->save();

		Session::flash('success', 'Faq added succesfully');

	  	return redirect()->back();
    }

    public function update(Request $request){

    	$faq_id = $request->faq_id;

    	$faq = Faq::find($faq_id);

    	$faq->question = $request->question;
    	$faq->answer = $request->answer;
    	$faq->type = $request->type;
    	// $faq->language_id = $request->language;

    	$faq->save();


    	Session::flash('success', 'Faq update succesful');

	  	return redirect()->back();
    }

    public function delete(Request $request){
        $id = $request->input('faq_id');
        $faq = Faq::find($id);

        $faq->delete();

        Session::flash('success', 'Faq Deleted succesfully');

        return redirect()->back();
    }

}
