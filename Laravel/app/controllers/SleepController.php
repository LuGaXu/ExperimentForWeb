<?php

class SleepController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$faker = Faker\Factory::create();

		$bodydata=[];

		for($i=1;$i<=8;$i++){


			for($j=1;$j<=6;$j++){
				
					$start=$faker->dateTimeBetween($min='- '.($j+1).' days', $max = '- '.($j).' days');
                    $stop=$faker->dateTimeBetween($min='- '.$j.' days', $max = '- '.$j.' days');
					while($start>=$stop){
						$start=$faker->dateTimeBetween($min='- '.($j+1).' days', $max = '- '.($j).' days');
                    	$stop=$faker->dateTimeBetween($min='- '.$j.' days', $max = '- '.$j.' days');
					}
					$one=strtotime($start->format('Y-m-d H:i:s'));
					$two=strtotime($stop->format('Y-m-d H:i:s'));
					$cle = ($two -$one)/2.0/60;
					$mincle=($two -$one)/3.0/60;
					
					$dailydata=new SleepData;
					$dailydata->uid=$i;
					$dailydata->year=2015;
					$dailydata->month=12;
					$dailydata->day=7-$j;
					$dailydata->start=$start;
					$dailydata->stop=$stop;
					
					$dailydata->dsNum =$faker->numberBetween($min=$mincle,$max=$cle);
                    $dailydata->lsNum = $faker->numberBetween($min=$mincle,$max=$cle);
                    $dailydata->wakeTime =$faker->numberBetween($min=0,$max=5);
					
					$bodydata[]=$dailydata;
					
				
			}
			/*for($j=1;$j<=31;$j++){
				for($k=0;$k<=24;$k++){
					$dailydata=new SleepRate;
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
		return View::make('sleepdata_xml')->with('bodydata',$bodydata);
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
		//$message = file_get_contents(php://input);
		//return json_encode(Request::instance()->getContent());
		$message = file_get_contents('php://input');
		$message = simplexml_load_string($message, 'SimpleXMLElement', LIBXML_NOCDATA);
		$response["id"][]=[12];
		return Response::json($response,200);
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
