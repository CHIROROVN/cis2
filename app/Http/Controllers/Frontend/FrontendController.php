<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Config;
use DB;

class FrontendController extends Controller
{
    public function __construct(){
        $configs = Config::get('constants.DEFINE');     
        foreach($configs as $key => $value)
        {
            define($key, $value);
        }

    }

}