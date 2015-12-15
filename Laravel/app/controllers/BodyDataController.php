<?php

class BodyDataController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$faker = Faker\Factory::create();

		$bodydata=[];

		for($i=1;$i<=20;$i++){

			$height= $faker->randomFloat($nbMaxDecimals = NULL, $min = 155, $max = 200);
            $weight=$faker->randomFloat($nbMaxDecimals = NULL, $min = 40, $max = 150);
            $bust=$faker->numberBetween($min=60,$max=110);
            $waist=$faker->numberBetween($min=50,$max=110);
            $hip=$faker->numberBetween($min=65,$max=110);

			for($j=1;$j<=250;$j++){
				$dailydata=new Bodydata;
				$dailydata->userId=$i;
				$dailydata->measureTime=$faker->dateTimeBetween($min='- '.$j.' days', $max = '- '.($j-1).' days');
				$dailydata->height=$height+$faker->numberBetween(-3,3);
				$dailydata->weight=$weight+$faker->numberBetween(-3,3);
				$dailydata->bust=$bust+$faker->numberBetween(-3,3);
				$dailydata->waist=$waist+$faker->numberBetween(-3,3);
				$dailydata->hip=$hip+$faker->numberBetween(-3,3);
				$dailydata->heartRate=$faker->numberBetween($min=50,$max=90);
				$dailydata->systolic=$faker->numberBetween($min=100,$max=140);
				$dailydata->diastolic=$faker->numberBetween($min=60,$max=90);
				$bodydata[]=$dailydata;
			}
		}

		return View::make('bodydata_xml')->with('bodydata',$bodydata);
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
    		$bodydata=new Bodydata;
    		$bodydata->userId=$dailydata->userId;
    		$bodydata->measureTime=$dailydata->measureTime;
    		$bodydata->height=$dailydata->height;
    		$bodydata->weight=$dailydata->weight;
    		$bodydata->bust=$dailydata->bust;
    		$bodydata->waist=$dailydata->waist;
    		$bodydata->hip=$dailydata->hip;
    		$bodydata->heartRate=$dailydata->heartRate;
    		$bodydata->systolic=$dailydata->systolic;
    		$bodydata->diastolic=$dailydata->diastolic;
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
				
		$body_data=DB::table('bloodpressure')
					->where('uid',$id)
					->get();

		foreach ($body_data as $daily_data) {
			$response["bodydata"][]=[
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

}
