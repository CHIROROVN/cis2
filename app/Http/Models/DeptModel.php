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
            'dept_name'                      => 'required|regex:/^[^\\p{Zs}]+$/u',
        );
    }

    public function Messages()
    {
        return array(
            'dept_name.required'             => trans('validation.error_dept_name_required'),
            'dept_name.regex'                => trans('validation.error_dept_name_regex'),
        );
    }

    public function getAllDept($faculty_id){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->where('dept_parent_id', '=', $faculty_id)->orderBy('dept_sort', 'ASC')->get();
    }

    public function getListDepartment()
    {
        $results = DB::table($this->table)->leftJoin('m_faculty', 'm_dept.dept_parent_id', '=', 'm_faculty.faculty_id')->where('m_dept.last_kind', '<>', DELETE)
                   ->where('m_faculty.last_kind', '<>', DELETE)->select('dept_name', 'faculty_name','dept_id','faculty_id')->orderBy('faculty_sort', 'asc')->orderBy('dept_sort', 'asc')->get();  

        return $results;
    }

    public function getDepartmentNameByID($dept_id)
    {
        $results = DB::table($this->table)->leftJoin('m_faculty', 'm_dept.dept_parent_id', '=', 'm_faculty.faculty_id')->where('m_dept.last_kind', '<>', DELETE)
                   ->where('m_faculty.last_kind', '<>', DELETE)->select('dept_name', 'faculty_name','dept_id')->where('dept_id', '=', $dept_id)->first(); 
   
        return isset($results->dept_id)?$results->faculty_name.' '.$results->dept_name:'';
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('dept_id', $id)->update($data);
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('dept_id', $id)->first();
    }

    //get max dept sort
    public function sort_max()
    {
        return DB::table($this->table)->select('dept_sort')->where('last_kind', '<>', DELETE)->max('dept_sort');
    }

}