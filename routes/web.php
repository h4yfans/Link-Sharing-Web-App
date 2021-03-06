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

Route::get('/', [
    'uses' => 'UserController@getIndex',
    'as'   => 'index',
]);

Route::group(['prefix' => 'user'], function () {
    Route::get('/register', [
        'uses' => 'UserController@getsignUp',
        'as'   => 'get.signup',
    ]);

    Route::post('/register', [
        'uses' => 'UserController@postsignUp',
        'as'   => 'post.signup',
    ]);

    Route::get('/login', [
        'uses' => 'UserController@getSignIn',
        'as'   => 'get.login',
    ]);

    Route::post('/login', [
        'uses' => 'UserController@postSignIn',
        'as'   => 'post.login',
    ]);

    Route::post('/logout', [
        'uses'       => 'UserController@logout',
        'as'         => 'logout',
        'middleware' => 'auth',
    ]);

    Route::get('/profile/', [
        'uses'       => 'PostController@getProfile',
        'as'         => 'get.profile',
        'middleware' => 'auth',
    ]);


});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/shareLink', [
        'uses' => 'PostController@getShareLink',
        'as'   => 'get.sharelink',
    ]);

    Route::post('/shareLink', [
        'uses' => 'PostController@postShareLink',
        'as'   => 'post.sharelink',
    ]);

   Route::post('/UpdateLike', [
        'uses' => 'LikeController@UpdateLike'
    ]);

    Route::post('/UpdateLikeSum', [
        'uses' => 'LikeController@UpdateLikeSum'
    ]);


});


