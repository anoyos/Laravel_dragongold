<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

    public function index() {
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/admin", 'name' => "Admin Management"],
            ['link' => "/admin/admin", 'name' => "All Admin"],
        ];

        $admins = Admin::all();

        return view('admin.admins.index', compact('breadcrumbs', 'admins'));
    }

    public function show(Request $request) {

        $modal = $request->modal;
        $admin_id = $request->admin_id;
        $admin = Admin::find($admin_id);

        echo $admin;
    }

    public function store(Request $request) {

        $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = new Admin();

        $admin->username = $request->username;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->access = '1';
        $admin->password = bcrypt($request->input('password'));

        $admin->save();

        Session::flash('success', 'Admin added succesfully');

        return redirect()->back();
    }

    public function updatePassword(Request $request) {
        $admin_id = $request->input('admin_id');
        $old_pwd = $request->input('old_pwd');

        $this->validate($request, [
            'old_pwd' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
            // return 'Checked';

        $admin_password = Admin::where('id', $admin_id)->value('password');

        if (Hash::check($old_pwd, $admin_password)) {
            $admin = Admin::find($admin_id);

            $admin->password = bcrypt($request->input('password'));
            $admin->save();
            Session::flash('success', 'Password Changed successfully');
        } else {
            Session::flash('error', 'Your old password is not correct');
        }

        return redirect()->back();
    }

}
