<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Models\SearchModel;
use App\Http\Models\DeptModel;
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
        $data['txtKeyword'] 		= !empty($txtKeyword) ? trim($txtKeyword) : NULL ;
        $data['departments']   		= $clsSearch->getlistDepartment();
        $data['teachers']      		= $clsSearch->get_teacher($data['teacher_dept'],$data['txtKeyword']);     	
		return view('backend.search.list',$data);
	}
	
	public function detail($id){	
        $clsSearch              = new SearchModel(); 
        $clsDept                = new DeptModel();
        $data['teacher']   		= $clsSearch->get_detail_teacher($id); 
        $data['dept_name1']   	= (isset($data['teacher']->teacher_dept1) && $data['teacher']->teacher_dept1 >0)?$clsDept->getDepartmentNameByID($data['teacher']->teacher_dept1):'';        
        $data['dept_name2']   	= (isset($data['teacher']->teacher_dept2) && $data['teacher']->teacher_dept2 >0)?$clsDept->getDepartmentNameByID($data['teacher']->teacher_dept2):'';            
		return view('backend.search.detail',$data);
	}
}