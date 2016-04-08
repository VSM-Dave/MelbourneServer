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
Route::get('admin/events/{event_id}/comment/create', ['as' => 'admin.events.comment.create', 'uses' => 'Admin\CommentsController@createFromEvent']);

Route::get('admin/events/{event}/confirm', ['as' => 'admin.events.confirm', 'uses' => 'Admin\EventsController@confirm']);
Route::resource('admin/events', 'Admin\EventsController', ['except' => ['show']]);

Route::get('admin/comments/{comment}/confirm', ['as' => 'admin.comments.confirm', 'uses' => 'Admin\CommentsController@confirm']);
Route::resource('admin/comments', 'Admin\CommentsController', ['except' => ['show']]);

Route::get('admin/dashboard', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@index']);

Route::get('/', ['as' => 'pages.index', 'uses' => 'FrontendController@index']);
Route::get('resolved', ['as' => 'pages.resolved', 'uses' => 'FrontendController@ShowResolved']);
Route::get('scheduled', ['as' => 'pages.scheduled', 'uses' => 'FrontendController@ShowScheduled']);
Route::get('event/{id}', ['as' => 'pages.event', 'uses' => 'FrontendController@ShowEvent']);

// Route::get('/', function () {
//     return view('welcome');
// });
