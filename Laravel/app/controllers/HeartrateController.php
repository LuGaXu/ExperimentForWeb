<?php

class HeartrateController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$faker = Faker\Factory::create();

		$bodydata=[];

		for($i=7;$i<=7;$i++){


			for($j=1;$j<=15;$j++){
				for($k=0;$k<=24;$k++){
					$dailydata=new HeartRate;
					$dailydata->uid=$i;
					$dailydata->year=2015;
					$dailydata->month=11;
					$dailydata->day=$j;
					$dailydata->hour=$k;
					$dailydata->maxdata=$faker->numberBetween($min=80,$max=100);
					$dailydata->mindata=$faker->numberBetween($min=60,$max=80);
					$bodydata[]=$dailydata;
				}
			}
			/*for($j=1;$j<=31;$j++){
				for($k=0;$k<=24;$k++){
					$dailydata=new HeartRate;
					$dailydata->uid=$i;
					$dailydata->year=2015;
					$dailydata->month=10;
					$dailydata->day=$j;
					$dailydata->hour=$k;
					$dailydata->maxdata=$faker->numberBetween($min=80,$max=100);
					$dailydata->mindata=$faker->numberBetween($min=60,$max=80);
					$bodydata[]=$dailydata;
				}
			}//for j*/
		}
		return View::make('heartratedata_xml')->with('bodydata',$bodydata);
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
		//
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
		$body_data=DB::table('heartrate')
					->where('uid',$id)
					->get();

		foreach ($body_data as $daily_data) {
			$response["heartratedata"][]=[
				"year"=>$daily_data->year,"month"=>$daily_data->month,"day"=>$daily_data->day,"hour"=>$daily_data->hour,
				"max"=>$daily_data->max,"min"=>$daily_data->min

			];
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
