<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Helpers\TransactionHelper;

class UserController extends Controller {

    public function show(Request $request) {
        $user_id = $request->get('user_id');
        $user = User::find($user_id);

        $item = [
            'fullname' => $user->fname . ' ' . $user->lname,
            'email' => $user->email,
            'status' => $user->status,
            'username' => $user->username
        ];

        $balance = TransactionHelper::totalBalance($user);
        $invest = TransactionHelper::totalInvested($user);
        $withdraw = TransactionHelper::totalWithdraw($user);
        $item['balance'] = $balance;
        $item['totalInvested'] = $invest;
        $item['totalWithdraw'] = round($withdraw, 2);

        return $item;
    }

}
