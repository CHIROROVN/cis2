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
            'research_name'                      => 'required',
        );
    }

    public function Messages()
    {
        return array(
            'research_name.required'             => trans('validation.error_research_name_required'),
        );
    }

    public function getAllResearch(){
        return DB::table($this->table)->where('last_kind', '<>', DELETE)->orderBy('research_sort', 'ASC')->get();
    }
    public function getlistResearch()
    {        
        $results = DB::table('m_research')->where('last_kind', '<>', DELETE)->lists( 'research_name','research_id'); //      
        return $results;
    }
    public function getResearchNameByID($research_id)
    {        
        $results = DB::table('m_research')->where('last_kind', '<>', DELETE)->where('research_id', '=', $research_id)->select('research_name')->first();  //      
        return isset($results->research_name)?$results->research_name:'';
    }

}