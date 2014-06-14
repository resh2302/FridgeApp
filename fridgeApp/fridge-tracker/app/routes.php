<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });

Route::get('/', function(){
	return View::make('home');
});

Route::resource('users', 'UsersController');
Route::get('register', 'UsersController@create');

// Route::get('users/create', function(){
// 	Redirect::route('register');
// });

Route::get('users/create', array('as' => 'register', 'uses' => 'UsersController@create'));

Route::resource('sessions', 'SessionsController');
Route::get('login', 'SessionsController@create');
Route::get('sessions/create', array('as' => 'login', 'uses' => 'SessionsController@create'));
Route::when('sessions/create', 'login');

Route::get('logout', 'SessionsController@destroy');

Route::get('admin', function(){
   return 'Admin Page...'; 
})->before('auth');

Route::resource('refrigerators', 'RefrigeratorsController');
Route::get('refrigerators/show/{RefrigeratorID}', 'RefrigeratorsController@show')->before('auth');
