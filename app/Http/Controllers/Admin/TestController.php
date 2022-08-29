<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller {

    public function index() {
        return "Hello from admin page";
    }

    public function content() {

        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "/", 'name' => "Starter Kit"], ['name' => "Content Layout"]
        ];

        return view('admin.pages.content', compact('breadcrumbs'));
    }

    public function full() {
        $pageConfigs = [
            'bodyClass' => "bg-full-screen-image",
        ];

        return view('admin.pages.full', [
            'pageConfigs' => $pageConfigs
        ]);
    }

}
