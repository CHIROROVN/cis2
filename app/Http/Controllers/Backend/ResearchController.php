<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\BackendController;

use App\Http\Models\ResearchModel;
use App\Http\Models\FacultyModel;
use App\Http\Models\TeacherModel;
use Validator;
use Session;
use Html;
use Input;
use Auth;

class ResearchController extends BackendController
{
	public function index($id){
		$clsFaculty = new FacultyModel();
		$faculty_name = $clsFaculty->get_name_by_id($id);
		$data['faculty_name'] = reset($faculty_name);
		$data['faculty_id'] = $id;
		$clsResearch = new ResearchModel();
		$data['research'] = $clsResearch->getAllResearch($id);
		return view('backend.research.index', $data);
	}

	public function regist($id){
		$clsFaculty = new FacultyModel();
		$faculty_name = $clsFaculty->get_name_by_id($id);
		$data['faculty_name'] = reset($faculty_name);
		$data['faculty_id'] = $id;
		return view('backend.research.regist', $data);
	}

	public function postRegist($id){
		$clsResearch = new ResearchModel();
		$max_sort = $clsResearch->sort_max();
		$validator = Validator::make(Input::all(), $clsResearch->Rules(), $clsResearch->Messages());

		if ($validator->fails()) {
			return redirect()->route('backend.research.regist',$id)->withErrors($validator)->withInput();
		}

		$data['research_name'] = Input::get('research_name');
		$data['research_parent_id'] = $id;

		$research_dspl_flag = Input::get('research_dspl_flag');
		if(!empty($research_dspl_flag)){
			$data['research_dspl_flag'] = Input::get('research_dspl_flag');
		}else{
			$data['research_dspl_flag'] = NULL;
		}

		$data['research_sort'] = (int) $max_sort + 1;
		$data['last_date'] = date('Y-m-d H:i:s');
		$data['last_kind'] = INSERT;
		$data['last_user'] = Auth::user()->u_id;

		if($clsResearch->insert($data)){
			Session::flash('success', trans('common.msg_cts-adm_regist_success'));
			return redirect()->route('backend.research.index', $id);
		}else{
			Session::flash('danger', trans('common.msg_cts-adm_regist_danger'));
			return redirect()->route('backend.research.regist', $id);
		}

	}

	public function edit($faculty_id, $id){
		$clsFaculty = new FacultyModel();
		$faculty_name = $clsFaculty->get_name_by_id($faculty_id);
		$data['faculty_name'] = reset($faculty_name);
		$data['faculty_id'] = $faculty_id;

		$clsResearch = new ResearchModel();
		$data['research'] = $clsResearch->get_by_id($id);
		$data['research_id'] = $id; 
		return view('backend.research.edit', $data);
	}

	public function postEdit($faculty_id, $id){
		$clsResearch = new ResearchModel();
		$validator = Validator::make(Input::all(), $clsResearch->Rules(), $clsResearch->Messages());

		if ($validator->fails()) {
			return redirect()->route('backend.research.edit',[$faculty_id, $id])->withErrors($validator)->withInput();
		}

		$data['research_name'] = Input::get('research_name');
		$research_dspl_flag = Input::get('research_dspl_flag');
		if(!empty($research_dspl_flag)){
			$data['research_dspl_flag'] = Input::get('research_dspl_flag');
		}else{
			$data['research_dspl_flag'] = NULL;
		}

		$data['last_date'] = date('Y-m-d H:i:s');
		$data['last_kind'] = UPDATE;
		$data['last_user'] = Auth::user()->u_id;

		if($clsResearch->update($id, $data)){
			if($data['research_dspl_flag']==1)
			{
                $clsTeacher          = new TeacherModel();
                $clsTeacher->inActiveTeacher($id,3);
			}	 
			Session::flash('success', trans('common.msg_cts-adm_edit_success'));
			return redirect()->route('backend.research.index',$faculty_id);
		}else{
			Session::flash('danger', trans('common.msg_cts-adm_edit_danger'));
			return redirect()->route('backend.research.edit',[$faculty_id, $id]);
		}
	}

	public function delete($faculty_id, $id){
		$clsFaculty = new FacultyModel();
		$faculty_name = $clsFaculty->get_name_by_id($faculty_id);
		$data['faculty_name'] = reset($faculty_name);
		$data['faculty_id'] = $faculty_id;
		$clsResearch = new ResearchModel();
		$data['research'] = $clsResearch->get_by_id($id);
		return view('backend.research.delete', $data);
	}

	public function saveDelete($faculty_id, $id){
		$clsResearch = new ResearchModel();
		$data['last_date'] = date('Y-m-d H:i:s');
		$data['last_kind'] = DELETE;
		$data['last_user'] = Auth::user()->u_id;

		if($clsResearch->update($id, $data)){
			Session::flash('success', trans('common.msg_cts-adm_del_success'));
			return redirect()->route('backend.research.index',$faculty_id);
		}else{
			Session::flash('danger', trans('common.msg_cts-adm_del_danger'));
			return redirect()->route('backend.research.index',$faculty_id);
		}
	}

	public function sort_ajax(){
		$faculty_id = Input::get('faculty_id');
		$clsResearch = new ResearchModel();
		$research = $clsResearch->getAllResearch($faculty_id);

		$total = count($research);
		$first = $research[0];
		$last = $research[$total -1];

		$id = Input::get('id');
		$action = Input::get('action');
		$sort = Input::get('sort');
		
		if($action == 'TOP'){
			$first_sort = $first->research_sort;
			$data['research_sort'] = $first_sort - 1;
			$data['last_date'] = date('Y-m-d H:i:s');
			$clsResearch->update($id, $data);
		}

		if($action == 'UP'){
			foreach ($research as $kC => $valC) {
				if($valC->research_id == $id){
					if($kC == 0){
						$prevC = $research[$kC];
					}else{
						$prevC = $research[$kC-1];
					}
					$prevID = $prevC->research_id;
					$prevSort = $prevC->research_sort;
					$clsResearch->update($prevID, ['research_sort'=>$sort]);
					$clsResearch->update($id, ['research_sort'=>$prevSort]);
					break;
				}
			}
		}

		if($action == 'LAST'){
			$last_sort = $last->research_sort;
			$data['research_sort'] = $last_sort + 1;
			$data['last_date'] = date('Y-m-d H:i:s');
			$clsResearch->update($id, $data);
		}

		if($action == 'DOWN'){
			foreach ($research as $kC => $valC) {
				if($valC->research_id == $id){
					if($kC == $total-1){
						$nextC = $research[$kC];
					}else{
						$nextC = $research[$kC+1];
					}
					$nextID = $nextC->research_id;
					$nextSort = $nextC->research_sort;
					$clsResearch->update($nextID, ['research_sort'=>$sort]);
					$clsResearch->update($id, ['research_sort'=>$nextSort]);

					break;
				}
			}
		}

		return response()->json(['response'=> 'OK']);
	}

}