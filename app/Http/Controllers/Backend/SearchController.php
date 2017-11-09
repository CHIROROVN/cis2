<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\SearchModel;
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
      
	   return view('backend.search.index',$data);
	}

	public function search(){	

		return view('backend.search.list');
	}
	public function detail(){	

		return view('backend.search.detail');
	}
}