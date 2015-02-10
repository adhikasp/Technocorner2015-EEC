<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $t)
		{
			$t->increments('id');

			$t->string('question');
			$t->string('image')->nullable();
			$t->string('chA');
			$t->string('chB');
			$t->string('chC');
			$t->string('chD');
			$t->string('answer', 1);

			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questions');
	}

}
