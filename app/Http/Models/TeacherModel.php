<?php namespace App\Http\Models;

use DB;
use Hash;
use Auth;
use Validator;

class TeacherModel
{
   protected $table = 't_teacher';

    public function Rules()
    {
        return array(
           'teacher_name2f' => 'regex:/^[\x{3041}-\x{3096}]+$/u',  
           'teacher_name2g' => 'regex:/^[\x{3041}-\x{3096}]+$/u',     
           //'teacher_url'  => 'nullable|regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/',
           'teacher_photo'  => 'image|mimes:jpg,jpeg,png,gif|max:5000',                   
        );
    }

    public function Messages()
    {
        return array(
           'teacher_name2f.regex'  => trans('validation.error_teacher_name_regex'), 
           'teacher_name2g.regex'  => trans('validation.error_teacher_name_regex'),            
           //'teacher_url.regex'     => trans('validation.error_teacher_name_regex'),
           'teacher_photo.image'     => trans('validation.error_teacher_photo_mimes'),
        );
    }
    
    public function get_all()
    {
        $results = DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('teacher_id', 'desc')->get();
        return $results;
    }

    public function insert($data)
    {
        $results = DB::table($this->table)->insert($data);        
        return $results;
    }

    public function get_by_id($id)
    {
        $results = DB::table($this->table)->leftJoin('m_research', 'm_research.research_id', '=', 't_teacher.teacher_research')
                                         ->leftJoin('m_dept', 'm_dept.dept_id', '=', 't_teacher.teacher_dept1')->where('teacher_id', $id)->first();        
        return $results;
    }
   
    public function update($id, $data)
    {
        $results = DB::table($this->table)->where('teacher_id', $id)->update($data);
        return $results;
    }    
    
    public function inActiveTeacher($id,$type){//type={1=>faculty,2=>dept,3=>research}
       if($type==1){//faculty
          $arrDept = DB::table('m_dept')->where('dept_parent_id', $id)->get();
          if(count($arrDept) >0){
             foreach($arrDept as $vDept){
               $results =DB::table($this->table)->where('teacher_dept1', $vDept->dept_id)->update(['teacher_dspl_flag' => '1']);  
             } 
          }
          $arrResearch = DB::table('m_research')->where('research_parent_id', $id)->get();
          if(count($arrResearch) >0){
             foreach($arrResearch as $vResearch){
               $results =DB::table($this->table)->where('teacher_research', $vResearch->research_id)->update(['teacher_dspl_flag' => '1']);  
             } 
          }
       }elseif($type==2){//dept
           $results =DB::table($this->table)->where('teacher_dept1', $id)->update(['teacher_dspl_flag' => '1']);
       }elseif($type==3)
       {
          $results =DB::table($this->table)->where('teacher_research', $id)->update(['teacher_dspl_flag' => '1']);  
       }

    } 

}