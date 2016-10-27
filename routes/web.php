<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('feeds.index');
});

Route::group(['prefix' => 'user'],function (){
    Route::get('/register', [
        'uses' => 'UserController@getsignUp',
        'as'   => 'get.signup',
    ]);

    Route::post('/register', [
        'uses' => 'UserController@postsignUp',
        'as' => 'post.signup'
    ]);
});


