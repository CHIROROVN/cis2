<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Form;
use Input;
use Validator;
use Session;
use Config;
use App;
use DB;

class SearchController extends BackendController
{
	
	public function index(){	

		return view('backend.search.index');
	}

	public function search(){	

		return view('backend.search.list');
	}
}