<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Transaction;
use Session;

class UserController extends Controller {

    public function index() {
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/users", 'name' => "User Management"],
            ['link' => "/admin/users", 'name' => "All Users"],
        ];

        $users = User::all();

        return view('admin.users.index', compact('breadcrumbs', 'users'));
    }

    public function status(Request $request, $status) {
        $title = ucfirst($status) . ' Users';
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/users", 'name' => "User Management"],
            ['link' => "/admin/users/$status", 'name' => $title]
        ];

        switch ($status) {
            case 'active':
                $users = User::where([['status', '=', '1'], ['email_verified_at', '!=', null]])->get();
                break;
            case 'blocked':
                $users = User::where([['status', '=', '0'], ['email_verified_at', '!=', null]])->get();
                break;
            case 'unverified':
                $users = User::where('email_verified_at', null)->get();
                break;
            default:
                break;
        }

        return view('admin.users.status', compact('breadcrumbs', 'users', 'title'));
    }

    public function activeUsers() {
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/users", 'name' => "User Management"],
            ['link' => "/admin/users/active", 'name' => "Active Users"]
        ];

        $users = User::where([['status', '=', '1'], ['email_verified_at', '!=', null]])->get();

        return view('admin.users.active', compact('breadcrumbs', 'users'));
    }

    public function blockedUsers() {
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/users", 'name' => "User Management"],
            ['link' => "/admin/users/active", 'name' => "Blocked Users"]
        ];

        $users = User::where([['status', '=', '0'], ['email_verified_at', '!=', null]])->get();

        return view('admin.users.blocked', compact('breadcrumbs', 'users'));
    }

    public function unverifiedUsers() {
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/users", 'name' => "User Management"],
            ['link' => "/admin/users/active", 'name' => "Unverified Users"]
        ];

        $users = User::where('email_verified_at', null)->get();

        return view('admin.users.unverified', compact('breadcrumbs', 'users'));
    }

    public function show(Request $request) {
        $modal = false;

        $modal = $request->modal;
        $user_id = $request->user_id;
        $user = User::find($user_id)->with('transactions')->first();
        // $user = Transaction::where('user_id',$user_id)->with('currency', 'user')->get();
        if ($modal == true) {
            echo $user;
        } else {
            return view('admin.users.show', compact('user'));
        }
    }

    public function block($user) {
        $user = User::find($user);

        $user->status = 0;
        $user->save();

        Session::flash('success', 'User blocked succesfully');

        return redirect()->back();
    }

    public function unblock($user) {
        $user = User::find($user);

        $user->status = 1;
        $user->save();
        Session::flash('success', 'User unblocked succesfully');

        return redirect()->back();
    }

}
