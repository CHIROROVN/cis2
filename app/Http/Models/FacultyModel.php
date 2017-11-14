<?php namespace App\Http\Models;

use DB;
use Hash;
use Auth;
use Validator;

class FacultyModel
{
    protected $table   = 'm_faculty';
    protected $primaryKey   = 'faculty_id';
    public $timestamps  = false;

    public function Rules()
    {
        return array(
            'faculty_name'                      => 'required|regex:/^[^\\p{Zs}]+$/u',
        );
    }

    public function Messages()
    {
        return array(
            'faculty_name.required'             => trans('validation.error_faculty_name_required'),
            'faculty_name.regex'                => trans('validation.error_faculty_name_regex'),
        );
    }

    public function getAllFaculty(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('faculty_sort', 'ASC')->get();
    }

    public function get_by_id($id)
    {
        return DB::table($this->table)->where('faculty_id', $id)->first();
    }

    public function get_name_by_id($id)
    {
        return DB::table($this->table)->select('faculty_name')->where('faculty_id', $id)->first();
    }

    public function insert($data)
    {
        return DB::table($this->table)->insert($data);
    }

    public function update($id, $data)
    {
        return DB::table($this->table)->where('faculty_id', $id)->update($data);
    }

    //get max faculty sort
    public function sort_max()
    {
        return DB::table($this->table)->select('faculty_sort')->where('last_kind', '<>', DELETE)->max('faculty_sort');
    }

}