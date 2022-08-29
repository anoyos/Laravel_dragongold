<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferrerController extends Controller
{
    public function affiliates() {
        return view('users.referrer.affiliates');
    }
}
