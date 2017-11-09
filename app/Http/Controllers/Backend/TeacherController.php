<?php 
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;
use Auth;
use App\User;
use App\Http\Models\TeacherModel;
use App\Http\Models\ResearchModel;
use App\Http\Models\DeptModel;
use Form;
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
        $data['researches'] = $clsResearch->getlistResearch();
		return view('backend.teacher.regist',$data);
	}

	public function postRegist()
    {
        $clsTeacher      = new TeacherModel();
        $inputs         = Input::all();
        $validator      = Validator::make($inputs, $clsTeacher->Rules(), $clsTeacher->Messages());

        if ($validator->fails()) {
            return redirect()->route('backend.teacher.regist')->withErrors($validator)->withInput();
        }
        $belong = $clsTeacher->get_by_belong_code(Input::get('belong_code'));
        if(isset($belong->belong_id)){
            $error['belong_code']      = trans('validation.error_belong_code_unique');  
            return redirect()->route('backend.teacher.regist')->withErrors($error)->withInput();
        }
        // insert
        $max = $clsTeacher->get_max();
        $dataInsert             = array(
            'belong_name'       => Input::get('belong_name'),
            'belong_sort'       => $max + 1,            
            'belong_code'       => Input::get('belong_code'),
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => INSERT,
            'last_ipadrs'       => CLIENT_IP_ADRS,
            'last_user'         => Auth::user()->u_id            
        );
        
        if ( $clsTeacher->insert($dataInsert) ) {
            Session::flash('success', trans('common.msg_regist_success'));
        } else {
            Session::flash('danger', trans('common.msg_regist_danger'));
        }
        return redirect()->route('backend.teacher.index');
    }

    /**
     * 
     */
    public function getEdit($id)
    {
        $clsTeacher          = new TeacherModel();
        $data['belong']     = $clsTeacher->get_by_id($id);
        $data['error']['error_belong_name_required']    = trans('validation.error_belong_name_required');
        $data['error']['error_belong_code_required']    = trans('validation.error_belong_code_required');
        return view('backend.teacher.edit', $data);
    }

    /**
     * 
     */
    public function postEdit($id)
    {
        $clsTeacher      = new TeacherModel();
        $inputs         = Input::all();
        $validator      = Validator::make($inputs, $clsTeacher->Rules(), $clsTeacher->Messages());
        if ($validator->fails()) {
            return redirect()->route('backend.teacher.edit', [$id])->withErrors($validator)->withInput();
        }
        $belong = $clsTeacher->get_by_belong_code(Input::get('belong_code'));
        if(isset($belong->belong_id) && $belong->belong_id != $id){
            $error['belong_code']      = trans('validation.error_belong_code_unique');  
            return redirect()->route('backend.teacher.edit', [$id])->withErrors($error)->withInput();
        }
        // update
        $dataUpdate = array(
            'belong_name'       => Input::get('belong_name'),
            'belong_code'       => Input::get('belong_code'),
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => UPDATE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => Auth::user()->u_id 
        );

        if ( $clsTeacher->update($id, $dataUpdate) ) {
            Session::flash('success', trans('common.msg_edit_success'));
        } else {
            Session::flash('danger', trans('common.msg_edit_danger'));
        }
        return redirect()->route('backend.teacher.index');
    }

    /**
     * 
     */
    public function getDelete($id)
    {
        $clsTeacher              = new TeacherModel();
        $dataUpdate             = array(
            'last_date'         => date('Y-m-d H:i:s'),
            'last_kind'         => DELETE,
            'last_ipadrs'       => $_SERVER['REMOTE_ADDR'],
            'last_user'         => Auth::user()->u_id 
        );
        if ( $clsTeacher->delete($id, $dataUpdate) ) {
            Session::flash('success', trans('common.msg_delete_success'));
        } else {
            Session::flash('danger', trans('common.msg_delete_danger'));
        }
        return redirect()->route('backend.teacher.index');
    }

    
}