<?php

class SportsDataTableSeeder extends Seeder {

        public function run() 
        {
    
            Eloquent::unguard();
    
            //DB::table('sportsdata')->delete();
    
            $faker = Faker\Factory::create();
    
            for($i = 1; $i <= 5; $i++){
                for($j=1;$j<=6;$j++){
                SportsData::create(array(
                    'uid' => $i,
					'year'=>2015,
					'month'=>12,
					'day'=>$j,
                   	'mile'=>$faker->numberBetween($min=0,$max=6000)
                ));

                }
            }
    
        }
    
    }
    
?>