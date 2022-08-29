<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Auth;

class AdminNavComposer {

    public function compose(View $view) {

        $notes  = Auth::user()->unreadNotifications;
        $view->with('notifications', $notes);
    }

}
