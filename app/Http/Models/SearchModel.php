<?php namespace App\Http\Models;

use DB;
use Validator;

class SearchModel
{
    protected $table        = 't_teacher';
    protected $primaryKey   = 'teacher_id';
    public $timestamps      = false;

    public function Rules()
    {
        return array();
    }

    public function Messages()
    {
        return array();
    }

    public function get_all($dept_id=null, $research_id=null,$key_words=null)
    {        
        $results = DB::table($this->table)->leftJoin('m_research', 'm_research.research_id', '=', 't_teacher.teacher_research');
        if(!empty($key_words)){
          $results = $results->Where(function ($query) use ($key_words) {
                                  $query->where('teacher_name1f',  'like',  '%' . $key_words . '%')
                                        ->orWhere('teacher_name1g','like', '%' . $key_words . '%')
                                        ->orWhere('teacher_name2f','like', '%' . $key_words . '%')
                                        ->orWhere('teacher_name2g','like', '%' . $key_words . '%');  
                               });  
        }
        if(!empty($dept_id)){
          $results = $results->Where(function ($query) use ($dept_id) {
                                 $query->where('teacher_dept1',  '=',  $dept_id)
                                        ->orWhere('teacher_dept2','=', $dept_id);  
                               });
        } 
        if(!empty($research_id)){
          $results = $results->where('teacher_research', '=', $research_id);
        }  
        $results = $results->where('t_teacher.last_kind', '<>', DELETE)->whereNull('teacher_dspl_flag')->paginate(LIMIT_PAGE);//->where('teacher_dspl_flag', '<>', '1')//->get();        
        return $results;           
    }

    public function get_teacher($dept_id=null,$key_words=null)
    {
         $results = DB::table($this->table)->leftJoin('m_dept', 'm_dept.dept_id', '=', 't_teacher.teacher_dept1')
                                           ;
          if(!empty($key_words)){
          $results = $results->Where(function ($query) use ($key_words) {
                                  $query->where('teacher_name1f',  'like',  '%' . $key_words . '%')
                                        ->orWhere('teacher_name1g','like', '%' . $key_words . '%')
                                        ->orWhere('teacher_name2f','like', '%' . $key_words . '%')
                                        ->orWhere('teacher_name2g','like', '%' . $key_words . '%');  
                               });  
        }
        if(!empty($dept_id)){
          $results = $results->Where(function ($query) use ($dept_id) {
                                 $query->where('teacher_dept1',  '=',  $dept_id)
                                        ->orWhere('teacher_dept2','=', $dept_id);  
                               });
        } 
        $results = $results->where('t_teacher.last_kind', '<>', DELETE)//->where('teacher_dspl_flag', '<>', '1')
                                ->select('dept_name', 'teacher_name1f', 'teacher_name1g','teacher_id','t_teacher.last_date','teacher_dspl_flag')->paginate(LIMIT_PAGE);
                                /*->toSql();
  echo $results;
                                 die;*/
        return $results;
    }
    public function getlistResearch()
    {        
        $results = DB::table('m_research')->where('last_kind', '<>', DELETE)->lists( 'research_name','research_id'); //      
        return $results;
    }
    
    public function getlistResearchInFaculty()
    {        
        $results = DB::table('m_research')->leftJoin('m_faculty', 'm_faculty.faculty_id', '=', 'm_research.research_parent_id')
                                          ->leftJoin('m_dept', 'm_dept.dept_id', '=', 'm_faculty.faculty_id')
                                          ->where('m_faculty.last_kind', '<>', DELETE)->where('m_dept.last_kind', '<>', DELETE)->where('m_research.last_kind', '<>', DELETE)->select( 'research_name','research_id','dept_id')->get(); //                                                
        return $results;
    }

    public function getlistDepartment()
    {        
        $results = DB::table('m_dept')->join('m_faculty', 'm_faculty.faculty_id', '=', 'm_dept.dept_id')->where('m_faculty.last_kind', '<>', DELETE)
                                      ->where('m_dept.last_kind', '<>', DELETE)->select('dept_name', 'faculty_name','dept_id')->orderBy('faculty_sort', 'asc')->orderBy('dept_sort', 'asc')->get();    
        return $results;
    }
    public function get_detail_teacher($teacher_id)
    {        
        $results = DB::table($this->table)->leftJoin('m_research', 'm_research.research_id', '=', 't_teacher.teacher_research')
                                         ->leftJoin('m_dept', 'm_dept.dept_id', '=', 't_teacher.teacher_dept1')
                                         ->where('t_teacher.teacher_id', '=', $teacher_id)->first();

        return $results;
    }

}

                                  