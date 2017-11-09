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

}