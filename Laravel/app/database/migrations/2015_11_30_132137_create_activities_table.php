<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('activities', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('location');
            $table->time('startTime');
            $table->time('stopTime');
            $table->time('signupStartTime');
            $table->time('signupStopTime');
            $table->integer('minPeople');
            $table->integer('maxPeople');
            $table->string('detail');
            $table->string('posterURL');
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
		Schema::dropIfExists('activities');
	}

}
