<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;

class SettingController extends Controller {

    public function general() {
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/settings", 'name' => "Settings"],
            ['link' => "/admin/settings/general", 'name' => "General"],
        ];

        return view('admin.settings.general', compact('breadcrumbs'));
    }

    public function saveGeneral(Request $request) {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'app' => 'required',
            'video' => 'required',
            'launch_date_submit' => 'required|date',
        ]);
        
        Setting::where('key', 'title')->update(['value' => $request->post('title')]);
        Setting::where('key', 'description')->update(['value' => $request->post('description')]);
        Setting::where('key', 'app')->update(['value' => $request->post('app')]);
        Setting::where('key', 'video')->update(['value' => $request->post('video')]);
        Setting::where('key', 'launch_date')->update(['value' => $request->post('launch_date_submit')]);

        return redirect()->route('admin.settings.general')->with('success', 'Settings saved successfully!');
    }
    
    public function address() {
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/settings", 'name' => "Settings"],
            ['link' => "/admin/settings/address", 'name' => "Company Address"],
        ];
        return view('admin.settings.address', compact('breadcrumbs'));
    }

    public function saveAddress(Request $request) {
        $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'company_country' => 'required',
            'company_number' => 'required',
        ]);
        
        Setting::where('key', 'company_name')->update(['value' => $request->post('company_name')]);
        Setting::where('key', 'company_address')->update(['value' => $request->post('company_address')]);
        Setting::where('key', 'company_country')->update(['value' => $request->post('company_country')]);
        Setting::where('key', 'company_number')->update(['value' => $request->post('company_number')]);

        return redirect()->route('admin.settings.address')->with('success', 'Settings saved successfully!');
    }
    
    
    public function earning() {
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/settings", 'name' => "Settings"],
            ['link' => "/admin/settings/earning", 'name' => "Earning"],
        ];
        return view('admin.settings.earning', compact('breadcrumbs'));
    }

    public function saveEarning(Request $request) {
        $request->validate([
            'profit_main' => 'required',
            'profit_weekend' => 'required',
            'auto_max' => 'required',
            'affiliate_l1' => 'required',
            'affiliate_l2' => 'required',
            'affiliate_l3' => 'required',
            'affiliate_l4' => 'required',
            'affiliate_l5' => 'required',
        ]);
        
        Setting::where('key', 'profit_main')->update(['value' => $request->post('profit_main')]);
        Setting::where('key', 'profit_weekend')->update(['value' => $request->post('profit_weekend')]);
        Setting::where('key', 'auto_max')->update(['value' => $request->post('auto_max')]);
        Setting::where('key', 'affiliate_l1')->update(['value' => $request->post('affiliate_l1')]);
        Setting::where('key', 'affiliate_l2')->update(['value' => $request->post('affiliate_l2')]);
        Setting::where('key', 'affiliate_l3')->update(['value' => $request->post('affiliate_l3')]);
        Setting::where('key', 'affiliate_l4')->update(['value' => $request->post('affiliate_l4')]);
        Setting::where('key', 'affiliate_l5')->update(['value' => $request->post('affiliate_l5')]);

        return redirect()->route('admin.settings.earning')->with('success', 'Settings saved successfully!');
    }

}
