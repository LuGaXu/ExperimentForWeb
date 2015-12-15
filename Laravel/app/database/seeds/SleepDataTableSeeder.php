<?php

class SleepDataTableSeeder extends Seeder {

        public function run() 
        {
    
            Eloquent::unguard();
    
           // DB::table('sleepdata')->delete();
    
            $faker = Faker\Factory::create();
    
            for($i = 1; $i <= 7; $i++){
                for($j=5;$j<=34;$j++){
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
					
                SleepData::create(array(
                    'uid' => $i,
					'year'=>2015,
					'month'=>11,
					'day'=>35-$j,
					'start'=>$start,
					'stop'=>$stop,
                   // 'start' => $faker->dateTimeBetween($min='- '.$j.' days', $max = '- '.($j-1).' days'),
                    //'stop' => $faker->dateTimeBetween($min='- '.($j-1).' days', $max = '- '.($j-2).' days'),
                    'dsNum' => $faker->numberBetween($min=$mincle,$max=$cle),
                    'lsNum' => $faker->numberBetween($min=$mincle,$max=$cle),
                    'wakeTime' =>$faker->numberBetween($min=0,$max=5)
                    
                ));
              }
            }
    
        }
    
    }
    
?>