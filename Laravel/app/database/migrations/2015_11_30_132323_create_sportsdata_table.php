<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportsdataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sportsdata',function($table)
		{
			$table->integer('userId');
			$table->time('startTime');
			$table->time('endTime');
			$table->integer('distanceCovered');
			$table->integer('stepsCount');
			$table->float('speed');
			$table->integer('calories');
			$table->integer('actTime');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('sportsdata');
	}

}
