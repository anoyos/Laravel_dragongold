<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/testtrans', 'TestController@testtrans')->name('tt');



Auth::routes(['verify' => true]);
Route::get('/', 'IndexController@index')->name('index');
Route::get('/lang/{locale}', 'IndexController@lang')->name('lang');
Route::get('/about', 'IndexController@about')->name('about');
Route::get('/investors', 'IndexController@investors')->name('investors');
Route::get('/affiliates', 'IndexController@affiliates')->name('home.affiliates');
Route::get('/bounty-program', 'IndexController@bounty')->name('bounty-program');
Route::get('/webinars', 'IndexController@webinars')->name('public_webinars');
Route::get('/faq', 'IndexController@faq')->name('faq');
Route::get('/feedback', 'PageController@feedback')->name('feedback');
Route::get('/news', 'IndexController@news')->name('news');
Route::get('/news/{news}', 'IndexController@showNews')->name('index.news.show');

/*The below routes will use a web middleware*/
Route::redirect('/office', '/office/dashboard');
Route::prefix('office')->middleware(['auth', 'verified'])->group(function(){
    Route::get('dashboard', 'HomeController@index')->name('dashboard');

    Route::get('settings', 'HomeController@settings')->name('settings');
    Route::post('settings/update/wallet', 'HomeController@updateWallet')->name('settings.update.wallet');
    Route::post('settings/update/password', 'HomeController@updatePassword')->name('settings.update.password');
    Route::post('settings/update/profile', 'HomeController@updateProfile')->name('settings.update.profile');
    Route::post('settings/update/social', 'HomeController@updateSocial')->name('settings.update.social');

    Route::post('settings/update/deposit_options', 'HomeController@updateDepositOption')->name('settings.update.deposit_options');

    Route::get('statistics', 'HomeController@statistics')->name('statistics');
    Route::get('transactions', 'TransactionController@index')->name('transactions');
    Route::get('affiliates', 'ReferrerController@affiliates')->name('affiliates');
    Route::get('support', 'HomeController@support')->name('support');
    Route::get('webinars', 'HomeController@webinars')->name('webinars');
    
    Route::resource('deposit', 'DepositController');
    Route::resource('withdraw', 'WithdrawController');
    Route::resource('news', 'NewsController');
});

Route::post('/ipn/coinpayments', 'PaymentController@ipnCoinPayments')->name('ipn.coinpayments');
Route::post('/ipn/withdraw', 'PaymentController@withdraw')->name('ipn.withdraw');
Route::get('/referrer/{username}', 'IndexController@referrer')->name('referrer');

// Admin Login Routes
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('adminlogin');
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::get('admin/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/login', 'Admin\LoginController@login')->name('admin.login');
Route::post('admin/password/email', 'Admin\ForgotPasswordController@sendRequestLinkEmail')->name('admin.password.email');
Route::post('admin/password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.reset');