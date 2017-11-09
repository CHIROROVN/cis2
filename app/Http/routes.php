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

 Route::get('/', function(){
 	return redirect()->route('frontend.search.index');
});


Route::group(['prefix' => 'hoge/teacher-db', 'namespace' => 'Frontend'], function () 
{
	Route::get('/search', ['as' => 'frontend.search.index', 'uses' => 'SearchController@index']);
	Route::post('/search', ['as' => 'frontend.search.index', 'uses' => 'SearchController@search']);
});

Route::group(['prefix' => 'hoge/teacher-db/contents-adm', 'namespace' => 'Backend'], function () 
{
	
	// menu
	Route::get('/menu', ['as' => 'backend.menu.index', 'uses' => 'MenuController@index']);
	//users
	Route::get('/login', ['as' => 'backend.users.login', 'uses' => 'UsersController@login']);
	Route::post('/login', ['as' => 'backend.users.login', 'uses' => 'UsersController@postLogin']);
	Route::get('/logout', ['as' => 'backend.users.logout', 'uses' => 'UsersController@logout']);

	Route::get('/search', ['as' => 'backend.search.index', 'uses' => 'SearchController@index']);
	Route::post('/search', ['as' => 'backend.search.index', 'uses' => 'SearchController@search']);
	Route::get('/search/detail', ['as' => 'backend.search.detail', 'uses' => 'SearchController@detail']);
});

Route::get('/auth/login', function(){
		return redirect()->route('backend.users.login');
});
