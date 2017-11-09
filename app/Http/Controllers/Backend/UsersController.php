<?php namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\UserModel;
use Illuminate\Http\Request;
use Validator;
use Session;
use Html;
use Input;
use Hash;
use Auth;

class UsersController extends BackendController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function login()
	{
		return view('backend.users.login');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postLogin()
	{
		$clsUser            = new UserModel();
		$validator = Validator::make(Input::all(), $clsUser->RulesLogin(), $clsUser->MessagesLogin());

		if ($validator->fails()) {
			return redirect()->route('backend.users.login')->withErrors($validator)->withInput();
		}
		//last_kind insert
		$login1['u_login'] =  Input::get('u_login');
		$login1['password'] =  Input::get('u_passwd');
		$login1['last_kind'] =  INSERT;

		//last_kind update
		$login2['u_login'] =  Input::get('u_login');
		$login2['password'] =  Input::get('u_passwd');
		$login2['last_kind'] =  UPDATE;

		if (Auth::attempt($login1, false) || Auth::attempt($login2, false)) {
			return redirect()->route('backend.menu.index');
		}  else {
			Session::flash('danger', trans('common.msg_manage_login_danger'));
			return redirect()->route('backend.users.login')->withErrors($validator)->withInput();
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function logout()
	{
		Session::flush();
		return view('backend.users.logout');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
