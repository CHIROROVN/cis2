<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Models\SearchModel;
use Html;
use Config;

class SearchController extends FrontendController {	

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
	   $clsSearch            = new SearchModel(); 
       $data['researches']   = $clsSearch->getlistResearch();
       $data['departments']   = $clsSearch->getlistDepartment();            
	   return view('frontend.search.index',$data);
	}
	public function search()
	{
		$clsSearch            = new SearchModel();
		$data['researches']   = $clsSearch->getlistResearch();
        $data['departments']   = $clsSearch->getlistDepartment();
		$data['teachers']      = $clsSearch->get_all();	

		return view('frontend.search.list',$data);
	}

}
