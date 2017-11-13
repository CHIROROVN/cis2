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
            //'tt_dataname' => 'required',                      
        );
    }

    public function Messages()
    {
        return array(
           // 'tt_dataname.required'  => trans('validation.error_tt_dataname_required'),            
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