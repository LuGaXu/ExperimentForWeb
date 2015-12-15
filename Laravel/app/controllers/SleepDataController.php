<?php

class SleepDataController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$body_data=DB::table('sleep')
					->get();

		foreach ($body_data as $daily_data) {
			$response["sleepdata"][]=[
				"uid"=>$daily_data->uid,"year"=>$daily_data->year,"month"=>$daily_data->month,"day"=>$daily_data->day,"start"=>$daily_data->start,
				"stop"=>$daily_data->stop,"dsNum"=>$daily_data->dsNum,"lsNum"=>$daily_data->lsNum,"wakeTime"=>$daily_data->wakeTime

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
    		$bodydata=new SleepData;
    		$bodydata->uid=$dailydata->uid;
    		$bodydata->year=$dailydata->year;
    		$bodydata->month=$dailydata->month;
    		$bodydata->day=$dailydata->day;
    		$bodydata->start=$dailydata->start;
			$bodydata->stop=$dailydata->stop;
    		$bodydata->dsNum=$dailydata->dsNum;
    		$bodydata->lsNum=$dailydata->lsNum;
			$bodydata->wakeTime=$dailydata->wakeTime;
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
	
		try{
			$body_data=DB::table('sleep')
						->where('uid',$id)
						->get();

			foreach ($body_data as $daily_data) {
				$response["sleepdata"][]=[
					"year"=>$daily_data->year,"month"=>$daily_data->month,"day"=>$daily_data->day,"start"=>$daily_data->start,
					"stop"=>$daily_data->stop,"dsNum"=>$daily_data->dsNum,"lsNum"=>$daily_data->lsNum,"wakeTime"=>$daily_data->wakeTime

				];
			}
		}catch(Exception $e){
			throw($e);
			return Response::json($response,404);
		}
		return Response::json($response,200);
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
