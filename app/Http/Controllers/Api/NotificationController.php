<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class NotificationController extends Controller
{
    public function markRead(Request $request){
    	$note_id = $request->input('id');
    	$user_id = $request->user_id;
    	$user = Admin::find($user_id);
    	$note  = $user->unReadNotifications->where('id', $note_id)->first();

    	$note->markAsRead();

    	return response()->json($note);
    }

    public function markAll(Request $request){
    	$user = Auth::user()->unReadNotifications();

    	$user->markAsRead();

    }
}