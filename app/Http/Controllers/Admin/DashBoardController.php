<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Transaction;

class DashBoardController extends Controller {

    public function index() {
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"]
        ];

        $data = [];

        $data['users'] = User::latest()->limit(5)->get();
        $data['transactions'] = Transaction::with(['user', 'currency'])->latest()->limit(10)->get();

        return view('admin.dashboard.index', compact('breadcrumbs', 'data'));
    }

}
