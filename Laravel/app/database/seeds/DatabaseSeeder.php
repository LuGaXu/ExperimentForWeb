<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		

		//$this->call('BodyDataTableSeeder');
		//$this->call('SportsDataTableSeeder');
		$this->call('SleepDataTableSeeder');

	

	}

}
