<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controller('auth', 'Auth\AuthController', [
	'getLogin' => 'auth.login',
	'getLogout' => 'auth.logout'

]);

Route::get('admin/dashboard', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@index']);

Route::get('/', function () {
    return view('welcome');
});
