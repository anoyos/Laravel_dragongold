<?php

/*
  |--------------------------------------------------------------------------
  | Admin Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "admin" middleware group. Enjoy building your API!
  |
 */


Route::get('welcome', 'TestController@index');
Route::get('content', 'TestController@content');
Route::get('full', 'TestController@full');
Route::get('dashboard', 'DashBoardController@index')->name('dashboard');
Route::post('logout', 'LoginController@logout')->name('logout');

Route::get('translation', 'TranslationController@index')->name('translation');
Route::get('translation/{locale}', 'TranslationController@locale')->name('translation.locale');
Route::post('translation/{locale}', 'TranslationController@localeUpdate')->name('translation.updatelocale');
Route::post('translation/{locale}/item', 'TranslationController@itemUpdate')->name('translation.updateitem');



Route::get('users', 'UserController@index')->name('user');
Route::get('users/{status}', 'UserController@status')->name('user.status')->where('status', 'active|blocked|unverified');
Route::get('user/{user_id}/block', 'UserController@block')->name('lock_user');
Route::get('user/{user_id}/unblock', 'UserController@unblock')->name('unlock_user');
Route::post('user', 'UserController@show')->name('user.show');

Route::get('transactions', 'TransactionController@index')->name('transactions');
Route::get('transactions/detail/{transaction_id}', 'TransactionController@detail')->name('transactions.detail');
Route::get('transactions/{type}', 'TransactionController@type')->name('transactions.type')->where('type', 'referral|credit|leadership');

/* Deposits */
Route::get('deposits', 'DepositController@index')->name('deposits');
Route::get('deposits/{status}', 'DepositController@status')->name('deposits.status')->where('status', 'active|pending|confirming|canceled');
Route::get('deposits/detail/{transaction_id}', 'DepositController@detail')->name('deposits.detail');
Route::get('deposits/assisted', 'DepositController@assisted')->name('deposits.assisted');
Route::post('deposits/assist', 'DepositController@resolvePayment')->name('deposits.assist');

/* Withdraw */
Route::get('withdrawals', 'WithdrawalController@index')->name('withdrawal');
Route::get('withdrawals/{status}', 'WithdrawalController@status')->name('withdrawal.status')->where('status', 'active|pending|canceled');
Route::get('withdrawals/detail/{withdrawal_id}', 'WithdrawalController@detail')->name('withdrawals.detail');

Route::post('withdrawal/approve', 'WithdrawalController@approve')->name('withdrawal.approve');
Route::post('withdrawal/cancel', 'WithdrawalController@cancel')->name('withdrawal.cancel');


Route::get('news', 'NewsController@index')->name('news');
Route::post('news/update', 'NewsController@update')->name('news.update');
Route::post('news', 'NewsController@store')->name('news.store');

/* faqs */
Route::get('faqs', 'FaqController@index')->name('faqs');
Route::post('faqs/update', 'FaqController@update')->name('faq.update');
Route::post('faqs', 'FaqController@store')->name('faq.store');
Route::post('faqs/delete', 'FaqController@delete')->name('faq.delete');

Route::get('audio/music', 'AudioController@music')->name('audio.music');
Route::get('audio/system', 'AudioController@system')->name('audio.system');
Route::post('audio/save', 'AudioController@save')->name('audio.save');
Route::post('audio/delete', 'AudioController@delete')->name('audio.delete');

Route::get('settings/general', 'SettingController@general')->name('settings.general');
Route::post('settings/general', 'SettingController@saveGeneral')->name('settings.general.save');
Route::get('settings/address', 'SettingController@address')->name('settings.address');
Route::post('settings/address', 'SettingController@saveAddress')->name('settings.address.save');
Route::get('settings/earning', 'SettingController@earning')->name('settings.earning');
Route::post('settings/earning', 'SettingController@saveEarning')->name('settings.earning.save');

Route::get('admin', 'AdminController@index')->name('admin');
Route::post('admin', 'AdminController@show')->name('admin.show');
Route::post('admin/store', 'AdminController@store')->name('admin.store');
Route::post('admin/update', 'AdminController@updatePassword')->name('admin.update');

Route::get('currencies', 'CurrencyController@index')->name('currencies');
Route::post('currencies/update', 'CurrencyController@update')->name('currency.update');
Route::post('currencies', 'CurrencyController@store')->name('currency.store');

Route::get('language', 'LanguageController@index')->name('language');
Route::post('language', 'LanguageController@store')->name('language.store');

Route::get('pages', 'PageController@index')->name('pages');
Route::get('pages/{page}', 'PageController@show')->name('pages.show');
Route::post('pages', 'PageController@update')->name('page.update');
Route::post('pages/store', 'PageController@store')->name('page.store');

Route::get('notifications/unread', 'NotificationController@unread')->name('notification.unread');
Route::get('notifications/read', 'NotificationController@read')->name('notification.read');
Route::get('test/here', 'PageController@show');