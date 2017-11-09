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
            'faculty_name'                      => 'required',
        );
    }

    public function Messages()
    {
        return array(
            'faculty_name.required'             => trans('validation.error_faculty_name_required'),
        );
    }

    public function getAllFaculty(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('faculty_sort', 'ASC')->get();
    }

}