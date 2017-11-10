<?php namespace App\Http\Models;

use DB;
use Hash;
use Auth;
use Validator;

class DeptModel
{
    protected $table   = 'm_dept';
    protected $primaryKey   = 'dept_id';
    public $timestamps  = false;

    public function Rules()
    {
        return array(
            'dept_name'                      => 'required',
        );
    }

    public function Messages()
    {
        return array(
            'dept_name.required'             => trans('validation.error_dept_name_required'),
        );
    }

    public function getAllDept(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('dept_sort', 'ASC')->get();
    }

    public function getListDepartment()
    {
        $results = DB::table($this->table)->leftJoin('m_faculty', 'm_dept.dept_parent_id', '=', 'm_faculty.faculty_id')->where('m_dept.last_kind', '<>', DELETE)
                   ->where('m_faculty.last_kind', '<>', DELETE)->select('dept_name', 'faculty_name','dept_id')->orderBy('faculty_sort', 'asc')->orderBy('dept_sort', 'asc')->get();  

        return $results;
    }

    public function getDepartmentNameByID($dept_id)
    {
        $results = DB::table($this->table)->leftJoin('m_faculty', 'm_dept.dept_parent_id', '=', 'm_faculty.faculty_id')->where('m_dept.last_kind', '<>', DELETE)
                   ->where('m_faculty.last_kind', '<>', DELETE)->select('dept_name', 'faculty_name','dept_id')->where('dept_id', '=', $dept_id)->first(); 
   
        return isset($results->dept_id)?$results->faculty_name.' '.$results->dept_name:'';
    }

}