<?php

class BodyDataTableSeeder extends Seeder {

        public function run() 
        {
    
            Eloquent::unguard();
    
           // DB::table('heartrate')->delete();
    
            $faker = Faker\Factory::create();

    
            for($i = 1; $i <=7; $i++){

               /* $height= $faker->randomFloat($nbMaxDecimals = NULL, $min = 155, $max = 200);
                $weight=$faker->randomFloat($nbMaxDecimals = NULL, $min = 40, $max = 150);
                $bust=$faker->numberBetween($min=60,$max=110);
                $waist=$faker->numberBetween($min=50,$max=110);
                $hip=$faker->numberBetween($min=65,$max=110);*/
				
				

                for($j=1; $j<=7; $j++){
					for($k=0;$k<=24;$k++){
							  BodyData::create(array(
                        'uid' => $i,
						'year'=>2015,
						'month'=>12,
						'day'=>$j,
						'hour'=>$k,
						'max'=>$faker->numberBetween($min=80,$max=100),
						'min'=>$faker->numberBetween($min=60,$max=80)
						//'max'=>$faker->numberBetween($min=100,$max=140),
						//'min'=>$faker->numberBetween($min=60,$max=90)
						      ));
                      /*  'height' => $height+$faker->numberBetween(-3,3),
                        'weight' => $weight+$faker->numberBetween(-3,3),
                        'bust' => $bust+$faker->numberBetween(-3,3),
                        'waist' => $waist+$faker->numberBetween(-3,3),
                        'hip' => $hip+$faker->numberBetween(-3,3),
                        'heartRate' => $faker->numberBetween($min=50,$max=120),
                        'systolic' => $faker->numberBetween($min=100,$max=140),
                        'diastolic' => $faker->numberBetween($min=50,$max=100),
                        'measureTime' =>$faker->dateTimeBetween($min='- '.$j.' days', $max = '- '.($j-1).' days')*/
              
						}
                  
                }
            }
    
        }
    
    }
    
?>