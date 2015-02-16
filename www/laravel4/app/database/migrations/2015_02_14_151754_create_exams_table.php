<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exams', function(Blueprint $t) {
			$t->increments('id');
			$t->integer('session');

			$t->integer('participant_id');
			$t->integer('qpack_id');
			$t->dateTime('start_time')->nullable();
			$t->dateTime('end_time')->nullable();
			$t->integer('score')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('exams');
	}

}
