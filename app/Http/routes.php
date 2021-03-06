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


Route::group(['prefix' => 'teacher-db', 'namespace' => 'Frontend'], function () 
{
	Route::get('/search', ['as' => 'frontend.search.index', 'uses' => 'SearchController@index']);
	Route::get('/teacher', ['as' => 'frontend.search.teacher', 'uses' => 'SearchController@search']);
	Route::get('/ajax/research/{id}', ['as' => 'frontend.search.research', 'uses' => 'SearchController@ajaxresearch']);
});

Route::group(['prefix' => 'teacher-db/contents-adm', 'namespace' => 'Backend'], function () 
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
	Route::get('/dept/regist/{id}', ['as' => 'backend.dept.regist', 'uses' => 'DeptController@regist']);
	Route::post('/dept/regist/{id}', ['as' => 'backend.dept.regist', 'uses' => 'DeptController@postRegist']);
	Route::get('/dept/edit/{faculty_id}/{id}', ['as' => 'backend.dept.edit', 'uses' => 'DeptController@edit']);
	Route::post('/dept/edit/{faculty_id}/{id}', ['as' => 'backend.dept.edit', 'uses' => 'DeptController@postEdit']);
	Route::get('/dept/delete/{faculty_id}/{id}', ['as' => 'backend.dept.delete', 'uses' => 'DeptController@delete']);
	Route::get('/dept/save_delete/{faculty_id}/{id}', ['as' => 'backend.dept.save_delete', 'uses' => 'DeptController@saveDelete']);
	Route::get('/depts/sort_ajax', ['as' => 'backend.dept.sort_ajax', 'uses' => 'DeptController@sort_ajax']);

	//Research
	Route::get('/research/{id}', ['as' => 'backend.research.index', 'uses' => 'ResearchController@index']);
	Route::get('/research/regist/{id}', ['as' => 'backend.research.regist', 'uses' => 'ResearchController@regist']);
	Route::post('/research/regist/{id}', ['as' => 'backend.research.regist', 'uses' => 'ResearchController@postRegist']);
	Route::get('/research/edit/{faculty_id}/{id}', ['as' => 'backend.research.edit', 'uses' => 'ResearchController@edit']);
	Route::post('/research/edit/{faculty_id}/{id}', ['as' => 'backend.research.edit', 'uses' => 'ResearchController@postEdit']);
	Route::get('/research/delete/{faculty_id}/{id}', ['as' => 'backend.research.delete', 'uses' => 'ResearchController@delete']);
	Route::get('/research/save_delete/{faculty_id}/{id}', ['as' => 'backend.research.save_delete', 'uses' => 'ResearchController@saveDelete']);
	Route::get('/researchs/sort_ajax', ['as' => 'backend.research.sort_ajax', 'uses' => 'ResearchController@sort_ajax']);

	//Search
	Route::get('/search', ['as' => 'backend.search.index', 'uses' => 'SearchController@index']);
	Route::get('/teacher', ['as' => 'backend.search.teacher', 'uses' => 'SearchController@search']);
	Route::get('/search/detail/{id}', ['as' => 'backend.search.detail', 'uses' => 'SearchController@detail']);
	//teacher	
	Route::get('/teacher/regist', ['as' => 'backend.teacher.regist', 'uses' => 'TeacherController@getRegist']);
    Route::post('/teacher/regist', ['as' => 'backend.teacher.regist', 'uses' => 'TeacherController@postRegist']);
    Route::post('/teacher/create', ['as' => 'backend.teacher.create', 'uses' => 'TeacherController@create']);
    Route::get('/teacher/delete/{id}', ['as' => 'backend.teacher.delete', 'uses' => 'TeacherController@getDelete']);
    Route::get('/teacher/delete/teacher/{id}', ['as' => 'backend.teacher.confirmdelete', 'uses' => 'TeacherController@postDelete']);
    Route::post('/teacher/delete/{id}', ['as' => 'backend.teacher.delete', 'uses' => 'TeacherController@postDelete']);
    Route::get('/teacher/edit/{id}', ['as' => 'backend.teacher.edit', 'uses' => 'TeacherController@getEdit']); 
    Route::post('/teacher/edit/{id}', ['as' => 'backend.teacher.edit', 'uses' => 'TeacherController@postEdit']);
    Route::post('/teacher/save/{id}', ['as' => 'backend.teacher.save', 'uses' => 'TeacherController@save']); 
});

Route::get('/auth/login', function(){
		return redirect()->route('backend.users.login');
});
