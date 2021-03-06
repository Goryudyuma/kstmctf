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

Route::get('/', 'MainController@index');

Route::get('/questionlist', 'MainController@qlist');
Route::post('/check', 'MainController@check');

Route::get('/create', 'MainController@create');
Route::post('/createcheck', 'MainController@createcheck');

Route::get('/auth/twitter', 'AuthController@redirectToProvider');
Route::get('/auth/twitter/callback', 'AuthController@handleProviderCallback');

Route::get('/auth/mail/register', 'AuthController@userMailRegister');
Route::post('/auth/mail/registerCallback', 'AuthController@userMailRegisterCallback');
Route::get('/auth/mail/login', 'AuthController@userMailLogin');
Route::post('/auth/mail/callback', 'AuthController@userMailCallback');

Route::get('/logout', 'AuthController@logout');

Route::get('/ranking', 'MainController@ranking');

Route::get('/mypage', 'MainController@mypage');

Route::get('/question/{questionid}', 'MainController@question')->where('questionid', '[0-9]+');
Route::get('/content/{questionid}', 'MainController@content')->where('questionid', '[0-9]+');
Route::get('/contentjson/{questionid}', 'MainController@contentjson')->where('question', '[0-9]+');
