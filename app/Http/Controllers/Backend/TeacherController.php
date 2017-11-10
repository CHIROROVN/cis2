<?php 
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Auth;
use App\User;
use App\Http\Models\TeacherModel;
use App\Http\Models\ResearchModel;
use App\Http\Models\DeptModel;
use Form;
use File;
use Html;
use Input;
use Validator;
use URL;
use Session;
use Config;

class TeacherController extends BackendController
{
	
	public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }	
    

	public function getRegist(){
        $data =array();
        $clsResearch      = new ResearchModel();
        $clsDept          = new DeptModel();
        $data['researches'] = $clsResearch->getlistResearch();
        $data['departments'] = $clsDept->getListDepartment();
		return view('backend.teacher.regist',$data);
	}

	public function postRegist()
    {
        $clsDept          = new DeptModel();
        $inputs         = Input::all();
        $Filename= '';
        if(Input::hasFile('teacher_photo')){
            $upload_file = Input::file('teacher_photo');
            $Filename  = $upload_file->getClientOriginalName();
            $path   = '/uploads/tempt/';
            $upload_file->move(public_path().$path, $Filename);
        }        
        $data = array();
        if(count($inputs) >0){
           foreach($inputs as $key=>$val)
           {
               if($key !='_token' && $key !='teacher_photo')
                 $data['teacher'][$key] = $val; 
           } 
           $data['teacher']['teacher_photo'] = $Filename;
           $data['teacher']['dept_name1']    = (!empty($data['teacher']['teacher_dept1']))?$clsDept->getDepartmentNameByID($data['teacher']['teacher_dept1']) :''; 
           $data['teacher']['dept_name2']    = (!empty($data['teacher']['teacher_dept2']))?$clsDept->getDepartmentNameByID($data['teacher']['teacher_dept2']) :'';
           $data['teacher']['research_name'] = (!empty($data['teacher']['teacher_research']))?$clsResearch->getResearchNameByID($data['teacher']['teacher_research']) :''; 
        }                          
        Session::put('teacher', $data['teacher']);
        return view('backend.teacher.check',$data);
    }

    public function create()
    {
        $clsTeacher      = new TeacherModel();
        $data            = session('teacher');   
        $data['last_date']  = date('Y-m-d H:i:s');
        $data['last_kind']  = INSERT;  
        $data['last_ipadrs']  = CLIENT_IP_ADRS;  
        $data['last_user']  = Auth::user()->u_id;   
        if(!empty($data['teacher_photo'])){            
           if (\File::copy(public_path().'/uploads/tempt/'.$data['teacher_photo'] , public_path().'/uploads/'.$data['teacher_photo'])) {
              $data['teacher_photo'] =  'uploads/'.$data['teacher_photo'];
              File::delete(public_path().'/uploads/tempt/'.$data['teacher_photo']); 
           }
        }
        unset($data['dept_name1']);unset($data['dept_name2']);unset($data['research_name']);
        
        if ( $clsTeacher->insert($data) ) {
            Session::flash('success', trans('common.msg_regist_success'));
        } else {
            Session::flash('danger', trans('common.msg_regist_danger'));
        }
        return view('backend.teacher.save'); 
    }
    public function save($id)
    {
        $clsTeacher             = new TeacherModel();
        $data                   = session('teacher');   
        $data['last_date']      = date('Y-m-d H:i:s');
        $data['last_kind']      = UPDATE;  
        $data['last_ipadrs']    = CLIENT_IP_ADRS;  
        $data['last_user']      = Auth::user()->u_id;   
        if(!empty($data['teacher_photo'])){                     
           if (File::exists(public_path().'/uploads/tempt/'.$data['teacher_photo'])) {
               if (\File::copy(public_path().'/uploads/tempt/'.$data['teacher_photo'] , public_path().'/uploads/'.$data['teacher_photo'])) {
                  $data['teacher_photo'] =  'uploads/'.$data['teacher_photo'];
                  File::delete(public_path().'/uploads/tempt/'.$data['teacher_photo']); 
              }
           }
        }
        unset($data['dept_name1']);unset($data['dept_name2']);unset($data['research_name']);
        
        if ( $clsTeacher->update($id,$data) ) {
            Session::flash('success', trans('common.msg_edit_success'));
        } else {
            Session::flash('danger', trans('common.msg_edit_danger'));
        }
        return view('backend.teacher.save'); 
    }

    /**
     * 
     */
    public function getEdit($id)
    {
        $clsTeacher          = new TeacherModel();
        $clsResearch         = new ResearchModel();
        $clsDept             = new DeptModel();
        $data['teacher']     = $clsTeacher->get_by_id($id);
        $data['researches'] = $clsResearch->getlistResearch();
        $data['departments'] = $clsDept->getListDepartment();
        return view('backend.teacher.edit', $data);
    }

    /**
     * 
     */
    public function postEdit($id)
    {
        $clsResearch         = new ResearchModel();
        $clsDept             = new DeptModel();
        $inputs         = Input::all();
        $choose_upload = Input::get('chkPhoto');
        $Filename= ''; $data = array();
        if(count($inputs) >0){
           foreach($inputs as $key=>$val)
           {
               if($key !='_token' && $key !='chkPhoto' && $key !='upload_photo')
                 $data['teacher'][$key] = $val; 
           }   
           $data['teacher']['teacher_id']    =  $id;   
           $data['teacher']['dept_name1']    = (!empty($data['teacher']['teacher_dept1']))?$clsDept->getDepartmentNameByID($data['teacher']['teacher_dept1']) :''; 
           $data['teacher']['dept_name2']    = (!empty($data['teacher']['teacher_dept2']))?$clsDept->getDepartmentNameByID($data['teacher']['teacher_dept2']) :'';
           $data['teacher']['research_name'] = (!empty($data['teacher']['teacher_research']))?$clsResearch->getResearchNameByID($data['teacher']['teacher_research']) :''; 
           if($choose_upload==2){
                if(Input::hasFile('upload_photo')){
                    $upload_file = Input::file('upload_photo');
                    $Filename  = $upload_file->getClientOriginalName();
                    $path   = '/uploads/tempt/';
                    $upload_file->move(public_path().$path, $Filename);
                    $data['teacher']['teacher_photo'] = $Filename;
                }            
           }elseif($choose_upload==3){
                $data['teacher']['teacher_photo'] = '';
           }
        }                                          
        Session::put('teacher', $data['teacher']);
        return view('backend.teacher.check_edit',$data);
    }

    /**
     * 
     */
    public function getDelete($id)
    {
       $clsTeacher              = new TeacherModel();
       $data['teacher']     = $clsTeacher->get_by_id($id);
       return view('backend.teacher.detail', $data);
    }
     public function postDelete($id)
    {
        $clsTeacher              = new TeacherModel();
        $dataUpdate             = array(
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => DELETE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => Auth::user()->u_id 
        );
        if ( $clsTeacher->update($id, $dataUpdate) ) {
            Session::flash('success', trans('common.msg_delete_success'));
        } else {
            Session::flash('danger', trans('common.msg_delete_danger'));
        }
        return view('backend.teacher.save');
    }

    
}