<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    //return ['hello' => 'hello'];
    return $request->user();
});


Route::get('deposit/list', 'DepositController@lists')->name('api.deposit.list');
Route::post('deposit', 'DepositController@create')->name('api.deposit.create');
Route::post('deposit/{id}/cancel', 'DepositController@cancel')->name('api.deposit.cancel');

Route::get('withdraw/list', 'WithdrawController@lists')->name('api.withdraw.list');
Route::post('withdraw', 'WithdrawController@create')->name('api.withdraw.create');

Route::get('user', 'UserController@show')->name('api.user.show');

Route::get('transactions', 'TransactionController@index')->name('api.transactions');
Route::post('notification/mark', 'NotificationController@markRead')->name('api.notification.mark');