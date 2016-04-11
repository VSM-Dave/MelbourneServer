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

Route::get('rss', 'FrontendController@rss');

Route::get('feed', function(){

    // create new feed
    $feed = App::make("feed");

    // multiple feeds are supported
    // if you are using caching you should set different cache keys for your feeds

    // cache the feed for 60 minutes (second parameter is optional)
    $feed->setCache(60);

    // check if there is cached feed and build new only if is not
    if (!$feed->isCached())
    {
       // creating rss feed with our most recent 20 posts
       $posts = \DB::table('events')->where('status', '!=', 'Resolved')->orderBy('scheduled_for', 'desc')->take(20)->get();

       // set your feed's title, description, link, pubdate and language
       $feed->title = 'Your title';
       $feed->description = 'Your description';
       // $feed->logo = 'http://yoursite.tld/logo.jpg';
       $feed->link = url('feed');
       $feed->setDateFormat('datetime'); // 'datetime', 'timestamp' or 'carbon'
       $feed->pubdate = $posts[0]->created_at;
       $feed->lang = 'en';
       $feed->setShortening(true); // true or false
       $feed->setTextLimit(100); // maximum length of description text

       foreach ($posts as $post)
       {
           // set item's title, author, url, pubdate, description, content, enclosure (optional)*
           $feed->add(
           	$post->title, 
           	'Melbourne Server', 
           	route('pages.event', $post->id), 
           	$post->created_at, 
           	$post->status, 
           	$post->description);
       }

    }

    // first param is the feed format
    // optional: second param is cache duration (value of 0 turns off caching)
    // optional: you can set custom cache key with 3rd param as string
    return $feed->render('atom');

    // to return your feed as a string set second param to -1
    // $xml = $feed->render('atom', -1);

});


// Route::get('/', function () {
//     return view('welcome');
// });
