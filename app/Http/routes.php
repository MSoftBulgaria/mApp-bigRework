<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return File::get(public_path() . '/index.html');
});


Route::group(['prefix' => 'api'], function()
{
	Route::resource('authenticate', 'AuthenticateController', ['only' => ['index']]);
	Route::post('authenticate', 'AuthenticateController@authenticate');
});

/**
 * Prefix data
 */

Route::group(['prefix' => 'data'], function () {
	Route::get('videos', 'VideoController@loadStartData');
	Route::get('video/{id}', 'VideoController@loadMetadata');
});

Route::group(['prefix' => 'user'], function () {
	Route::get('all', 'UserController@getTopUsers');
});







Route::group(['middleware' => ['web']], function () {
    //
});



Route::resource('category', 'CategoryController');
Route::resource('thumbnail', 'ThumbnailController');
Route::resource('comment', 'CommentController');
Route::resource('video', 'VideoController');
Route::resource('user', 'UserController');
