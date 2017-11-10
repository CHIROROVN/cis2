<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

use App\Http\Models\FacultyModel;
use Validator;
use Session;
use Html;
use Input;
use Auth;

use Illuminate\Pagination\BootstrapThreePresenter;

class FacultyController extends BackendController
{
	public function index(){

		$clsFaculty = new FacultyModel();
		$data['faculty'] = $clsFaculty->getAllFaculty();
		return view('backend.faculty.index', $data);
	}

	public function regist(){
		return view('backend.faculty.regist');
	}

	public function postRegist(){
		$clsFaculty = new FacultyModel();
		$max_sort = $clsFaculty->sort_max();
		$validator = Validator::make(Input::all(), $clsFaculty->Rules(), $clsFaculty->Messages());

		if ($validator->fails()) {
			return redirect()->route('backend.faculty.regist')->withErrors($validator)->withInput();
		}

		$data['faculty_name'] = Input::get('faculty_name');

		if(!empty(Input::get('faculty_dspl_flag'))){
			$data['faculty_dspl_flag'] = Input::get('faculty_dspl_flag');
		}else{
			$data['faculty_dspl_flag'] = NULL;
		}

		$data['faculty_sort'] = (int) $max_sort + 1;
		$data['last_date'] = date('Y-m-d H:i:s');
		$data['last_kind'] = INSERT;
		$data['last_user'] = Auth::user()->u_id;

		if($clsFaculty->insert($data)){
			Session::flash('success', trans('common.msg_cts-adm_regist_success'));
			return redirect()->route('backend.faculty.index');
		}else{
			Session::flash('danger', trans('common.msg_cts-adm_regist_danger'));
			return redirect()->route('backend.faculty.regist');
		}

	}

	public function edit($id){
		$clsFaculty = new FacultyModel();
		$data['faculty'] = $clsFaculty->get_by_id($id);
		$data['faculty_id'] = $id; 
		return view('backend.faculty.edit', $data);
	}

	public function postEdit($id){
		$clsFaculty = new FacultyModel();
		$validator = Validator::make(Input::all(), $clsFaculty->Rules(), $clsFaculty->Messages());

		if ($validator->fails()) {
			return redirect()->route('backend.faculty.edit',$id)->withErrors($validator)->withInput();
		}

		$data['faculty_name'] = Input::get('faculty_name');

		if(!empty(Input::get('faculty_dspl_flag'))){
			$data['faculty_dspl_flag'] = Input::get('faculty_dspl_flag');
		}else{
			$data['faculty_dspl_flag'] = NULL;
		}

		$data['last_date'] = date('Y-m-d H:i:s');
		$data['last_kind'] = UPDATE;
		$data['last_user'] = Auth::user()->u_id;

		if($clsFaculty->update($id, $data)){
			Session::flash('success', trans('common.msg_cts-adm_edit_success'));
			return redirect()->route('backend.faculty.index');
		}else{
			Session::flash('danger', trans('common.msg_cts-adm_edit_danger'));
			return redirect()->route('backend.faculty.edit',$id);
		}
	}

	public function delete($id){
		$clsFaculty = new FacultyModel();
		$data['faculty'] = $clsFaculty->get_by_id($id);
		return view('backend.faculty.delete', $data);
	}

	public function saveDelete($id){
		$clsFaculty = new FacultyModel();
		$data['last_date'] = date('Y-m-d H:i:s');
		$data['last_kind'] = DELETE;
		$data['last_user'] = Auth::user()->u_id;

		if($clsFaculty->update($id, $data)){
			Session::flash('success', trans('common.msg_cts-adm_del_success'));
			return redirect()->route('backend.faculty.index');
		}else{
			Session::flash('danger', trans('common.msg_cts-adm_del_danger'));
			return redirect()->route('backend.faculty.index');
		}
	}


	public function sort_ajax(){
		$clsFaculty = new FacultyModel();
		$faculty = $clsFaculty->getAllFaculty();

		$total = count($faculty);
		$first = $faculty[0];
		$last = $faculty[$total -1];

		$id = Input::get('id');
		$action = Input::get('action');
		$sort = Input::get('sort');

		if($action == 'TOP'){
			$first_sort = $first->faculty_sort;
			if($first_sort <= 0){
				$data['faculty_sort'] = 0;
			}else{
				$data['faculty_sort'] = $first_sort - 1;
			}
			$data['last_date'] = date('Y-m-d H:i:s');
			$clsFaculty->update($id, $data);
		}

		if($action == 'UP'){
			foreach ($faculty as $kC => $valC) {
				if($valC->faculty_id == $id){
					$prevC = $faculty[$kC-1];
					$prevID = $prevC->faculty_id;
					$prevSort = $prevC->faculty_sort;
					$clsFaculty->update($prevID, ['faculty_sort'=>$sort]);
					$clsFaculty->update($id, ['faculty_sort'=>$prevSort]);
					break;
				}
			}
		}

		if($action == 'LAST'){
			$last_sort = $last->faculty_sort;
			$data['faculty_sort'] = $last_sort + 1;
			$data['last_date'] = date('Y-m-d H:i:s');
			$clsFaculty->update($id, $data);
		}

		if($action == 'DOWN'){

			foreach ($faculty as $kC => $valC) {
				if($valC->faculty_id == $id){
					$nextC = $faculty[$kC+1];
					$nextID = $nextC->faculty_id;
					$nextSort = $nextC->faculty_sort;
					$clsFaculty->update($nextID, ['faculty_sort'=>$sort]);
					$clsFaculty->update($id, ['faculty_sort'=>$nextSort]);

					break;
				}
			}
		}

	return response()->json(['response'=> 'OK']);

	}



}