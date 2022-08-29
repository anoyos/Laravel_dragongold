<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Currency;
use Session;

class CurrencyController extends Controller
{
    public function index(){
    	$breadcrumbs = [
    	    ['link' => "/admin/dashboard", 'name' => "Dashboard"],
    	    ['link' => "/admin/currencies", 'name' => "All Currencies"]
    	];

    	$currencies = Currency::all();

    	return view('admin.currencies.index', compact('breadcrumbs', 'currencies'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string',
            'symbol' =>'required|string',
            'min' =>'required',
            'max' =>'required',
            'is_fiat' =>'required',
        ]);
        
        $currency = new Currency();

        $currency->name = $request->name;
        $currency->symbol = $request->symbol;
        $currency->min = $request->min;
        $currency->max = $request->max;
        $currency->is_fiat = $request->is_fiat;
        $currency->color = $request->color;
        $currency->status = 1;
        
        $currency->save();

        Session::flash('success', 'Currency added succesfully');

        return redirect()->back();
    }

    public function update(Request $request){
    	$currency_id = $request->currency_id;
    	$currency = Currency::find($currency_id);

    	$currency->name = $request->name;
    	$currency->symbol = $request->symbol;
    	$currency->usdrate = $request->usdrate;
    	$currency->color = $request->color;
    	$currency->status = $request->status;
    	$currency->min = $request->min;
    	$currency->max = $request->max;
    	$currency->is_fiat = $request->is_fiat;
    	
    	$currency->save();

    	Session::flash('success', 'Currency update succesful');

	  	return redirect()->back();
    }
}
