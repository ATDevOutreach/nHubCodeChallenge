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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/sendSms', 'SmsController@sendChatMessage')->name('sendChatMessage');
Route::post('/sendussd', 'UssdController@index')->name('send_ussd');

// Authentication Route Group
Route::group(['prefix' => 'auth'], function() {

	// Account Registration Route Resources
	Route::get('/register', 'RegistrationController@register')->name('get_register');
	Route::post('/register', 'RegistrationController@store')->name('post_register');

	// Account Acitivation Route Resources
	Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate')->name('account_activation');

	// Recover Password Route Resources
	Route::get('/password-recovery', 'ForgotPasswordController@forgotPassword')->name('get_recovery');
	Route::post('/password-recovery', 'ForgotPasswordController@postForgotPassword')->name('password_recovery');
	
	// Reset Password Route Resources
	Route::get('/reset/{email}/{resetCode}', "ForgotPasswordController@resetPassword")->name('reset_password');
	Route::post('/reset/{email}/{resetCode}', "ForgotPasswordController@postResetPassword")->name('post_reset_password');

	// Login Route Resources
	Route::get('/login', 'LoginController@getLogin')->name('get_login');
	Route::post('/login', 'LoginController@doLogin')->name('do_login');

	// Logout Route Resources
	Route::post('/logout', 'LoginController@logout')->name('logout');
});

// Authenticated User Route Group
Route::group(['prefix' => 'dashboard'], function() {
	Route::get('/super-admin', 'DashboardController@superDash')->name('super_admin_dash')->middleware('superadmin');
	Route::get('/admin', 'DashboardController@adminDash')->name('admin_dash')->middleware('admin');
	Route::get('/', 'DashboardController@memberDash')->name('user_dash')->middleware('member');

	// Order Route Resources
	Route::get('/orders','OrderController@index')->name('orders')->middleware('member');
	Route::post('orders/{id}', 'OrderController@dispatchOrder')->name('dispatch_order')->middleware('member');
});
