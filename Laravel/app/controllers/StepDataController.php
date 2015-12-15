<?php

class StepDataController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$body_data=DB::table('step')
					->get();

		foreach ($body_data as $daily_data) {
			$response["stepdata"][]=[
				"uid"=>$daily_data->uid,"year"=>$daily_data->year,"month"=>$daily_data->month,"day"=>$daily_data->day,"steps"=>$daily_data->steps

			];
		}
		return Response::json($response,200);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$message = $GLOBALS['HTTP_RAW_POST_DATA'];
		$message = simplexml_load_string($message, 'SimpleXMLElement', LIBXML_NOCDATA);
    	foreach ($message as $dailydata) {
    		$bodydata=new StepData;
    		$bodydata->uid=$dailydata->uid;
    		$bodydata->year=$dailydata->year;
    		$bodydata->month=$dailydata->month;
    		$bodydata->day=$dailydata->day;
    	
    		$bodydata->steps=$dailydata->steps;
   
    		$bodydata->save();
    	}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//$response=["bloodpressure"=>[]];
				
		$body_data=DB::table('step')
					->where('uid',$id)
					->get();

		foreach ($body_data as $daily_data) {
			$response["stepdata"][]=[
				"year"=>$daily_data->year,"month"=>$daily_data->month,"day"=>$daily_data->day,"steps"=>$daily_data->steps

			];
		}
		return Response::json($response,200);

		/*if(Auth::check())
		{
			$body_data=DB::table('bodydata')->where('userId',$id)->orderBy('created_at','asc')->get();

			foreach ($body_data as $daily_data) {
				$weight[]=$daily_data->weight;
				$height[]=$daily_data->height;
				$bust[]=$daily_data->bust;
				$waist[]=$daily_data->waist;
				$hip[]=$daily_data->hip;
				$heartRate[]=$daily_data->heartRate;
				$systolic[]=$daily_data->systolic;
				$diastolic[]=$daily_data->diastolic;
			}
		}
		else
		{
			
		}*/

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
