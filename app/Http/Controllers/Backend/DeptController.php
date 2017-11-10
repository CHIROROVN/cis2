<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

use App\Http\Models\DeptModel;
use App\Http\Models\FacultyModel;
use Validator;
use Session;
use Html;
use Input;
use Auth;

class DeptController extends BackendController
{
	public function index($id){
		$clsDept = new DeptModel();
		$clsFaculty = new FacultyModel();
		$faculty_name = $clsFaculty->get_name_by_id($id);
		$data['faculty_name'] = reset($faculty_name);
		$data['faculty_id'] = $id;
		$data['depts'] = $clsDept->getAllDept($id);

		return view('backend.dept.index', $data);
	}

	public function regist($id){
		$clsFaculty = new FacultyModel();
		$faculty_name = $clsFaculty->get_name_by_id($id);
		$data['faculty_name'] = reset($faculty_name);
		$data['faculty_id'] = $id;
		return view('backend.dept.regist', $data);
	}

	public function postRegist($id){
		$clsDept = new DeptModel();
		$max_sort = $clsDept->sort_max();
		$validator = Validator::make(Input::all(), $clsDept->Rules(), $clsDept->Messages());

		if ($validator->fails()) {
			return redirect()->route('backend.dept.regist',$id)->withErrors($validator)->withInput();
		}

		$data['dept_name'] = Input::get('dept_name');
		$data['dept_parent_id'] = $id;

		$dept_dspl_flag = Input::get('dept_dspl_flag');
		if(!empty($dept_dspl_flag)){
			$data['dept_dspl_flag'] = Input::get('dept_dspl_flag');
		}else{
			$data['dept_dspl_flag'] = NULL;
		}

		$data['dept_sort'] = (int) $max_sort + 1;
		$data['last_date'] = date('Y-m-d H:i:s');
		$data['last_kind'] = INSERT;
		$data['last_user'] = Auth::user()->u_id;

		if($clsDept->insert($data)){
			Session::flash('success', trans('common.msg_cts-adm_regist_success'));
			return redirect()->route('backend.dept.index', $id);
		}else{
			Session::flash('danger', trans('common.msg_cts-adm_regist_danger'));
			return redirect()->route('backend.dept.regist', $id);
		}

	}

	public function edit($faculty_id, $id){
		$clsFaculty = new FacultyModel();
		$faculty_name = $clsFaculty->get_name_by_id($faculty_id);
		$data['faculty_name'] = reset($faculty_name);
		$data['faculty_id'] = $faculty_id;

		$clsDept = new DeptModel();
		$data['dept'] = $clsDept->get_by_id($id);
		$data['dept_id'] = $id; 
		return view('backend.dept.edit', $data);
	}

	public function postEdit($faculty_id, $id){
		$clsDept = new DeptModel();
		$validator = Validator::make(Input::all(), $clsDept->Rules(), $clsDept->Messages());

		if ($validator->fails()) {
			return redirect()->route('backend.dept.edit',[$faculty_id, $id])->withErrors($validator)->withInput();
		}

		$data['dept_name'] = Input::get('dept_name');
		$dept_dspl_flag = Input::get('dept_dspl_flag');
		if(!empty($dept_dspl_flag)){
			$data['dept_dspl_flag'] = Input::get('dept_dspl_flag');
		}else{
			$data['dept_dspl_flag'] = NULL;
		}

		$data['last_date'] = date('Y-m-d H:i:s');
		$data['last_kind'] = UPDATE;
		$data['last_user'] = Auth::user()->u_id;

		if($clsDept->update($id, $data)){
			Session::flash('success', trans('common.msg_cts-adm_edit_success'));
			return redirect()->route('backend.dept.index',$faculty_id);
		}else{
			Session::flash('danger', trans('common.msg_cts-adm_edit_danger'));
			return redirect()->route('backend.dept.edit',[$faculty_id, $id]);
		}
	}

	public function delete($faculty_id, $id){
		$clsFaculty = new FacultyModel();
		$faculty_name = $clsFaculty->get_name_by_id($faculty_id);
		$data['faculty_name'] = reset($faculty_name);
		$data['faculty_id'] = $faculty_id;
		$clsDept = new DeptModel();
		$data['dept'] = $clsDept->get_by_id($id);
		return view('backend.dept.delete', $data);
	}

	public function saveDelete($faculty_id, $id){
		$clsDept = new DeptModel();
		$data['last_date'] = date('Y-m-d H:i:s');
		$data['last_kind'] = DELETE;
		$data['last_user'] = Auth::user()->u_id;

		if($clsDept->update($id, $data)){
			Session::flash('success', trans('common.msg_cts-adm_del_success'));
			return redirect()->route('backend.dept.index',$faculty_id);
		}else{
			Session::flash('danger', trans('common.msg_cts-adm_del_danger'));
			return redirect()->route('backend.dept.index',$faculty_id);
		}
	}

	public function sort_ajax(){
		$faculty_id = Input::get('faculty_id');
		$clsDept = new DeptModel();
		$depts = $clsDept->getAllDept($faculty_id);

		$total = count($depts);
		$first = $depts[0];
		$last = $depts[$total -1];

		$id = Input::get('id');
		$action = Input::get('action');
		$sort = Input::get('sort');
		
		if($action == 'TOP'){
			$first_sort = $first->dept_sort;
			$data['dept_sort'] = $first_sort - 1;
			$data['last_date'] = date('Y-m-d H:i:s');
			$clsDept->update($id, $data);
		}

		if($action == 'UP'){
			foreach ($depts as $kC => $valC) {
				if($valC->dept_id == $id){
					if($kC == 0){
						$prevC = $depts[$kC];
					}else{
						$prevC = $depts[$kC-1];
					}
					$prevID = $prevC->dept_id;
					$prevSort = $prevC->dept_sort;
					$clsDept->update($prevID, ['dept_sort'=>$sort]);
					$clsDept->update($id, ['dept_sort'=>$prevSort]);
					break;
				}
			}
		}

		if($action == 'LAST'){
			$last_sort = $last->dept_sort;
			$data['dept_sort'] = $last_sort + 1;
			$data['last_date'] = date('Y-m-d H:i:s');
			$clsDept->update($id, $data);
		}

		if($action == 'DOWN'){
			foreach ($depts as $kC => $valC) {
				if($valC->dept_id == $id){
					if($kC == $total-1){
						$nextC = $depts[$kC];
					}else{
						$nextC = $depts[$kC+1];
					}
					$nextID = $nextC->dept_id;
					$nextSort = $nextC->dept_sort;
					$clsDept->update($nextID, ['dept_sort'=>$sort]);
					$clsDept->update($id, ['dept_sort'=>$nextSort]);

					break;
				}
			}
		}

	return response()->json(['response'=> 'OK']);

	}
}