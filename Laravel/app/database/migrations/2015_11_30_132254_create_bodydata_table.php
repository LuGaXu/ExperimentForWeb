<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodydataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bodydata',function($table)
		{
			$table->integer('userId');
			$table->timestamps();
			$table->float('height');
			$table->float('weight');
			$table->integer('bust');
			$table->integer('waist');
			$table->integer('hip');
			$table->integer('heartRate');
			$table->integer('systolic');
			$table->integer('diastolic');
			$table->date('measureTime');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('bodydata');
	}

}
