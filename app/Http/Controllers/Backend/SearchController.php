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
	
	public function index()
	{	
       $clsSearch            = new SearchModel();
       $data['teacher_dept'] = Input::get('teacher_dept');
       $txtKeyword           = Input::get('txtKeyword');
	   $data['txtKeyword']   =  trim($txtKeyword); 

       $data['researches']   = $clsSearch->getlistResearch();
       $data['departments']  = $clsSearch->getlistDepartment(); 
	   return view('backend.search.index',$data);
	}

	public function search()
	{	
		$clsSearch            		= new SearchModel();  
		$teacher_dept         		= Input::get('teacher_dept');
		$txtKeyword         		= Input::get('txtKeyword');
        $data['teacher_dept'] 		= !empty($teacher_dept) ? $teacher_dept : NULL;
        $data['txtKeyword'] 		= !empty(trim($txtKeyword)) ? trim($txtKeyword) : NULL ;
        $data['departments']   		= $clsSearch->getlistDepartment();
        $data['teachers']      		= $clsSearch->get_teacher($data['teacher_dept'],$data['txtKeyword']);       	
		return view('backend.search.list',$data);
	}
	
	public function detail($id){	
        $clsSearch            = new SearchModel(); 
        $data['teacher']   		= $clsSearch->get_detail_teacher($id);        
		return view('backend.search.detail',$data);
	}
}