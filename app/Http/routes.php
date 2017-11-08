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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::group(['prefix' => 'hoge', 'namespace' => 'Backend'], function () 
{
	Route::get('/', function(){
		return redirect()->route('backend.menu.index');
	});

	// menu
	Route::get('teacher-db/menu', ['as' => 'backend.menu.index', 'uses' => 'MenuController@index']);
	Route::get('teacher-db/search', ['as' => 'backend.search.index', 'uses' => 'SearchController@index']);
	Route::post('teacher-db/search', ['as' => 'backend.search.index', 'uses' => 'SearchController@search']);
	Route::get('teacher-db/search/detail', ['as' => 'backend.search.detail', 'uses' => 'SearchController@detail']);
});
Route::get('/cis/teacher-db', ['as' => 'frontend.search.index', 'uses' => 'SearchController@index']);