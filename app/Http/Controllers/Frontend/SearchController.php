<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Models\SearchModel;
use Html;
use Input;
use Config;

class SearchController extends FrontendController {	

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
	   $clsSearch            = new SearchModel(); 
       $data['researches']   = $clsSearch->getlistResearchInFaculty();
       $data['departments']   = $clsSearch->getlistDepartment();            
	   return view('frontend.search.index',$data);
	}
	public function search()
	{
		$clsSearch            		= new SearchModel();
		$teacher_dept               = Input::get('teacher_dept');
		$teacher_research           = Input::get('teacher_research');
		$txtKeyword                 = Input::get('txtKeyword');
		$data['teacher_dept'] 		= !empty($teacher_dept ) ? $teacher_dept  : NULL;
		$data['teacher_research'] 	= !empty($teacher_research ) ? $teacher_research  : NULL ;
		$data['txtKeyword'] 		= !empty($txtKeyword ) ? $txtKeyword  : NULL ;		
		$data['researches']   		= $clsSearch->getlistResearchInFaculty();
		$data['faculty_id']   		= 0;	
        $data['departments']   		= $clsSearch->getlistDepartment();
        if(!empty($data['teacher_dept'])){
        	foreach($data['departments'] as $department){
        		if($department->dept_id==$data['teacher_dept']){
                   $data['faculty_id'] = $department->faculty_id;
        		}	
        	}
		}
		$data['teachers']      		= $clsSearch->get_all($data['teacher_dept'],$data['teacher_research'],$data['txtKeyword']);	
       
		return view('frontend.search.list',$data);
	}

}
