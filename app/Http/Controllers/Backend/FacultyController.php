<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

use App\Http\Models\FacultyModel;
use Validator;
use Session;
use Html;
use Input;

class FacultyController extends BackendController
{
	public function index(){
		return view('backend.faculty.index');
	}
}