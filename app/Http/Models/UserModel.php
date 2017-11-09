<?php namespace App\Http\Models;

use DB;
use Hash;
use Auth;
use Validator;

class UserModel
{
    protected $table   = 'm_user';
    protected $primaryKey   = 'u_id';
    public $timestamps  = false;

    public function Rules()
    {
        return array(
            'u_name'                       => 'required',
            'u_login'                      => 'required',
            'u_passwd'                     => 'required',
        );
    }

    public function Messages()
    {
        return array(
            'u_name.required'              => trans('validation.error_u_name_required'),
            'u_login.required'             => trans('validation.error_u_login_required'),
            'u_passwd.required'            => trans('validation.error_u_passwd_required'),
        );
    }

    public function RulesLogin()
    {
        return array(
            'u_login'                      => 'required',
            'u_passwd'                     => 'required',
        );
    }

    public function MessagesLogin()
    {
        return array(
            'u_login.required'             => trans('validation.error_u_login_required'),
            'u_passwd.required'            => trans('validation.error_u_passwd_required'),
        );
    }

}