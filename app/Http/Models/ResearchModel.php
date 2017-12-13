<?php namespace App\Http\Models;

use DB;
use Hash;
use Auth;
use Validator;

class ResearchModel
{
    protected $table   = 'm_research';
    protected $primaryKey   = 'research_id';
    public $timestamps  = false;

    public function Rules()
    {
        return array(
            'research_name'                      => 'required|regex:/^[^\\p{Zs}]+$/u',
        );
    }

    public function Messages()
    {
        return array(
            'research_name.required'             => trans('validation.error_research_name_required'),
            'research_name.regex'                => trans('validation.error_research_name_regex'),
        );
    }

    public function getAllResearch($faculty_id){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('research_parent_id', '=', $faculty_id)->orderBy('research_sort', 'ASC')->get();
    }

    public function getlistResearch()
    {        
        $results = DB::table('m_research')->where('last_kind', '<>', DELETE)->lists( 'research_name','research_id'); //      
        return $results;
    }

    public function getlistResearchInFaculty()
    {        
        $results = DB::table('m_research')->leftJoin('m_faculty', 'm_faculty.faculty_id', '=', 'm_research.research_parent_id')
                                          //->leftJoin('m_dept', 'm_dept.dept_id', '=', 'm_faculty.faculty_id')
                                          ->where('m_faculty.last_kind', '<>', DELETE)->where('m_research.last_kind', '<>', DELETE)->select( 'research_name','research_id','faculty_id')->get(); //                                                
        return $results;//->where('m_dept.last_kind', '<>', DELETE)
    }

    public function getResearchNameByID($research_id)
    {        
        $results = DB::table('m_research')->where('last_kind', '<>', DELETE)->where('research_id', '=', $research_id)->select('research_name')->first();  //      
        return isset($results->research_name)?$results->research_name:'';
    }

    public function sort_max()
    {
        return DB::table($this->table)->select('research_sort')->where('last_kind', '<>', DELETE)->max('research_sort');
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('research_id', $id)->update($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('research_id', $id)->first();
    }

}