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
           'teacher_name2f' => 'nullable|regex:/^[\x{3041}-\x{3096}]+$/u',  
           'teacher_name2g' => 'nullable|regex:/^[\x{3041}-\x{3096}]+$/u',     
           'teacher_url' => 'nullable|regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/',                   
        );
    }

    public function Messages()
    {
        return array(
           'teacher_name2f.regex'  => trans('validation.error_teacher_name_regex'), 
           'teacher_name2g.regex'  => trans('validation.error_teacher_name_regex'),            
           'teacher_url.regex'     => trans('validation.error_teacher_name_regex'),
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
     

}