<?php namespace App\Http\Models;

use DB;
use Validator;

class SearchModel
{
    protected $table   = 't_teacher';
    protected $primaryKey   = 'teacher_id';
    public $timestamps  = false;

    public function Rules()
    {
        return array();
    }

    public function Messages()
    {
        return array();
    }

    public function get_all($belong_id=null, $year=null)
    {        
        $results = DB::table($this->table)->join('m_belong', 't_staff.staff_belong', '=', 'm_belong.belong_id')->where('t_staff.last_kind', '<>', DELETE);
        
        if(!empty($belong_id)){
              $results = $results->Where(function ($query) use ($belong_id) {
                                                            $query->where('m_belong.belong_id',  '=', $belong_id)
                                                                  ->orWhere('m_belong.belong_parent_id','=', $belong_id);
                                                        });                   
        }             

        $count = $results->count();
        $data  = $results->orderBy('staff_id', 'desc')->get();       
        return [
            'count' => $count,
            'data' => $data
        ];      
    }
    public function getlistResearch()
    {        
        $results = DB::table('m_research')->lists( 'research_name','research_id'); //->where('last_kind', '<>', DELETE)      
        return $results;
    }

}

                                  