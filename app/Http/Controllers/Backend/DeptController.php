<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

use App\Http\Models\DeptModel;
use Validator;
use Session;
use Html;
use Input;

class DeptController extends BackendController
{
	public function index($id){
		return view('backend.dept.index');
	}
}