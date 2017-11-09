<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

use App\Http\Models\ResearchModel;
use Validator;
use Session;
use Html;
use Input;

class ResearchController extends BackendController
{
	public function index(){
		return view('backend.research.index');
	}
}