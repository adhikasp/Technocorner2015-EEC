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
		Schema::create('peserta', function(Blueprint $t)
		{
			$t->increments('id');
			$t->string('nama_tim', 30);
			$t->string('email', 40);
			$t->string('password', 60); // Fungsi Hash::make() Laravel SELALU mengeluarkan 60 karakter
			$t->string('anggota_1', 30);
			$t->string('anggota_2', 30)->nullable();
			$t->string('anggota_3', 30)->nullable();
			$t->string('asal_sekolah', 40);

			$t->rememberToken();
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
		Schema::drop('peserta');
	}

}
