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

Route::get('/', function () {
	return redirect('/questionlist');
});

Route::get('/questionlist', 'MainController@index');
Route::post('/check', 'MainController@check');

Route::get('/create', 'MainController@create');
Route::post('/createcheck', 'MainController@createcheck');

Route::get('auth/twitter', 'AuthController@redirectToProvider');
Route::get('auth/twitter/callback', 'AuthController@handleProviderCallback');

