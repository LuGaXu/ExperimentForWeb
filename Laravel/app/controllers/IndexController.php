<?php

class IndexController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check())
		{
        	$nickname=Auth::user()->nickname;
        	return View::make('home')
        				->with('nickname',$nickname)
        				->with('checked',true);
    	}else{
        	return View::make('index')
        				->with('checked',false);
    	}
	}



}
