<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSleepdataTable extends Migration {

	/**f
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sleepdata',function($table)
		{
			$table->integer('userId');
			$table->time('startTime');
			$table->time('endTime');
			$table->integer('deepSleepTime');
			$table->integer('nonDeepSleepTime');
			$table->integer('wakeNum');
			$table->integer('score');
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
		Schema::dropIfExists('sleepdata');
	}

}
