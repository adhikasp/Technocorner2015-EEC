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

		Schema::create('users_peserta', function(Blueprint $t)
		{
			$t->increments('id');
			$t->string('nama_tim', 30)->unique();

			$t->string('anggota_1', 30);
			$t->string('anggota_2', 30)->nullable();
			$t->string('anggota_3', 30)->nullable();
			$t->string('asal_sekolah', 40);

			$t->integer('skor')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
		Schema::dropIfExists('users_peserta');
	}

}
