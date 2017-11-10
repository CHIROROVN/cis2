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
	Route::get('/', function(){
		return redirect()->route('backend.menu.index');
	});


	// menu
	Route::get('/menu', ['as' => 'backend.menu.index', 'uses' => 'MenuController@index']);
	//users
	Route::get('/login', ['as' => 'backend.users.login', 'uses' => 'UsersController@login']);
	Route::post('/login', ['as' => 'backend.users.login', 'uses' => 'UsersController@postLogin']);
	Route::get('/logout', ['as' => 'backend.users.logout', 'uses' => 'UsersController@logout']);

	//Faculty
	Route::get('/faculty', ['as' => 'backend.faculty.index', 'uses' => 'FacultyController@index']);
	Route::get('/faculty/regist', ['as' => 'backend.faculty.regist', 'uses' => 'FacultyController@regist']);
	Route::post('/faculty/regist', ['as' => 'backend.faculty.regist', 'uses' => 'FacultyController@postRegist']);
	Route::get('/faculty/edit/{id}', ['as' => 'backend.faculty.edit', 'uses' => 'FacultyController@edit']);
	Route::post('/faculty/edit/{id}', ['as' => 'backend.faculty.edit', 'uses' => 'FacultyController@postEdit']);
	Route::get('/faculty/delete/{id}', ['as' => 'backend.faculty.delete', 'uses' => 'FacultyController@delete']);
	Route::get('/faculty/save_delete/{id}', ['as' => 'backend.faculty.save_delete', 'uses' => 'FacultyController@saveDelete']);
	Route::get('/faculty/sort_ajax', ['as' => 'backend.faculty.sort_ajax', 'uses' => 'FacultyController@sort_ajax']);

	//Dept
	Route::get('/dept/{id}', ['as' => 'backend.dept.index', 'uses' => 'DeptController@index']);
	Route::get('/dept/regist', ['as' => 'backend.dept.regist', 'uses' => 'DeptController@regist']);
	Route::post('/dept/regist', ['as' => 'backend.dept.regist', 'uses' => 'DeptController@postRegist']);
	Route::get('/dept/edit/{id}', ['as' => 'backend.dept.edit', 'uses' => 'DeptController@edit']);
	Route::post('/dept/edit/{id}', ['as' => 'backend.dept.edit', 'uses' => 'DeptController@postEdit']);
	Route::get('/dept/delete/{id}', ['as' => 'backend.dept.delete', 'uses' => 'DeptController@delete']);
	Route::get('/dept/save_delete/{id}', ['as' => 'backend.dept.save_delete', 'uses' => 'FacultyController@saveDelete']);


	//Research
	Route::get('/research/{id}', ['as' => 'backend.research.index', 'uses' => 'ResearchController@index']);
	Route::get('/research/regist', ['as' => 'backend.research.regist', 'uses' => 'ResearchController@regist']);
	Route::post('/research/regist', ['as' => 'backend.research.regist', 'uses' => 'ResearchController@postRegist']);
	Route::get('/research/edit/{id}', ['as' => 'backend.research.edit', 'uses' => 'ResearchController@edit']);
	Route::post('/research/edit/{id}', ['as' => 'backend.research.edit', 'uses' => 'ResearchController@postEdit']);
	Route::get('/research/delete/{id}', ['as' => 'backend.research.delete', 'uses' => 'ResearchController@delete']);
	Route::get('/research/save_delete/{id}', ['as' => 'backend.research.save_delete', 'uses' => 'ResearchController@saveDelete']);

	//Search
	Route::get('/search', ['as' => 'backend.search.index', 'uses' => 'SearchController@index']);
	Route::post('/search', ['as' => 'backend.search.index', 'uses' => 'SearchController@search']);
	Route::get('/search/detail/{id}', ['as' => 'backend.search.detail', 'uses' => 'SearchController@detail']);
	//teacher	
	Route::get('/teacher/regist', ['as' => 'backend.teacher.regist', 'uses' => 'TeacherController@getRegist']);
    Route::post('/teacher/regist', ['as' => 'backend.teacher.regist', 'uses' => 'TeacherController@postRegist']);
    Route::post('/teacher/save', ['as' => 'backend.teacher.save', 'uses' => 'TeacherController@save']);
    Route::get('/teacher/delete/{dataname}', ['as' => 'backend.teacher.delete', 'uses' => 'TeacherController@getDelete']);
    Route::get('/teacher/edit/{id}', ['as' => 'backend.teacher.edit', 'uses' => 'TeacherController@getEdit']); 
    Route::post('/teacher/edit/{id}', ['as' => 'backend.teacher.edit', 'uses' => 'TeacherController@postEdit']); 
});

Route::get('/auth/login', function(){
		return redirect()->route('backend.users.login');
});
