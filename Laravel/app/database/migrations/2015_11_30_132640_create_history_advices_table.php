<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryAdvicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('historyAdvices',function($table)
		{
			$table->increments('id');
			$table->integer('userId');
			$table->integer('adviser');
			$table->string('advice');
			$table->time('adviceTime');
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
		Schema::dropIfExists('historyAdvices');
	}

}
