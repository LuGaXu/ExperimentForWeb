<?php

class BloodpressureController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$faker = Faker\Factory::create();

		$bodydata=[];

		for($i=6;$i<=6;$i++){


			for($j=16;$j<=30;$j++){
				for($k=0;$k<=24;$k++){
					$dailydata=new Bodydata;
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
					$dailydata=new Bodydata;
					$dailydata->uid=$i;
					$dailydata->year=2015;
					$dailydata->month=10;
					$dailydata->day=$j;
					$dailydata->hour=$k;
					$dailydata->maxdata=$faker->numberBetween($min=80,$max=100);
					$dailydata->mindata=$faker->numberBetween($min=60,$max=80);
					$bodydata[]=$dailydata;
				}
			}*/
		}

		return View::make('bloodpressuredata_xml')->with('bodydata',$bodydata);
		
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
				
		$body_data=DB::table('bloodpressure')
					->where('uid',$id)
					->get();

		foreach ($body_data as $daily_data) {
			$response["bloodpressuredata"][]=[
				"year"=>$daily_data->year,"month"=>$daily_data->month,"day"=>$daily_data->day,"hour"=>$daily_data->hour,
				"max"=>$daily_data->max,"min"=>$daily_data->min

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
