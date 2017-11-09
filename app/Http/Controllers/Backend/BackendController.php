<?php namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Config;
use DB;

class BackendController extends Controller
{
    public function __construct(){

        $this->middleware('auth', ['except' => ['postLogin', 'login','logout']]);

        $configs = Config::get('constants.DEFINE');
        foreach($configs as $key => $value)
        {
            define($key, $value);
        }

    }

}