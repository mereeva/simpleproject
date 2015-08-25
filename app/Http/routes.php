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

// Route::get('/', function () {
//     return view('login.register');
// });

Route::get('/', 'LoginController@getRegister');

Route::post('/register', 'LoginController@register');

Route::get('/register', 'LoginController@index');

Route::get('/logout', 'LoginController@logout');

Route::get('/login', 'LoginController@getRegister');