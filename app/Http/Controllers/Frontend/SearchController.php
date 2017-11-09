<?php namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Models\SearchModel;
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
	   return view('frontend.search.index');
	}
	public function search()
	{
		return view('frontend.search.list');
	}

}
