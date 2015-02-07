<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesertaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $t)
		{
			$t->increments('id');
			$t->string('email', 40)->unique();
			$t->string('password', 60); // Fungsi Hash::make() Laravel SELALU mengeluarkan 60 karakter

			$t->integer('userable_id')->nullable();
			$t->string('userable_type')->nullable();

			$t->rememberToken();
			$t->timestamps();
		});

		Schema::create('users_participant', function(Blueprint $t)
		{
			$t->increments('id');
			$t->string('team_name', 30)->unique();

			$t->string('member_1', 30);
			$t->string('member_2', 30)->nullable();
			$t->string('member_3', 30)->nullable();
			$t->string('school', 40);

			$t->integer('exam_status')->default(0);
			$t->dateTime('exam_datetime')->nullable()->default(null);

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
		Schema::drop('users');
		Schema::drop('users_participant');
	}

}
