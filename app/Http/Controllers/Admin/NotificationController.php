<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class NotificationController extends Controller
{
    public function unRead(){
    	$notifications = Auth::user()->unReadNotifications;

    	return view('admin.notifications.unread', compact('notifications'));
    }

    public function read(){
    	$notifications = Auth::user()->readNotifications;

    	return view('admin.notifications.read', compact('notifications'));
    }
}
