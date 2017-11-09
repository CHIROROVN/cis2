<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Models\SearchModel;
use Config;

class SearchController extends FrontendController {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/
	
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
