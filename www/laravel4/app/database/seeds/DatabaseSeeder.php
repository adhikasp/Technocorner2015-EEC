<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('PesertaTableSeeder');
		$this->command->info('Tabel peserta seeded!');
	}

}

class PesertaTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();

		DB::table('users_peserta')->delete();
		Peserta::create([
			'id' 					 => 1,
			'nama_tim'     => 'Technocorner Dummy Team 4EVER',
			// 'email'        => 'adhika.setyap@gmail.com',
			// 'password'     => Hash::make('1234'),

			'anggota_1'    => 'Dhika',
			'anggota_2'    => 'Roni',
			'anggota_3'    => 'Charlie',

			'asal_sekolah' => 'SMA N 3 Yogyakarta'
		]);
		Peserta::create([
			'id' 					 => 2,
			'nama_tim'     => 'Another Dummy',
			// 'email'        => 'dummy@technocornerugm.com',
			// 'password'     => Hash::make('1234'),

			'anggota_1'    => 'Tion',
			'anggota_2'    => 'Budi',
			'anggota_3'    => 'Anggoro',

			'asal_sekolah' => 'SMA N 1 Bangka',
		]);

		$u = new User;
		$u->email = 'adhika.setyap@gmail.com';
		$u->password = Hash::make('1234');
		$u->save();

		$p = Peserta::find(1);
		$p->user()->save($u);

		$u = new User;
		$u->email = 'dummy@technocornerugm.com';
		$u->password = Hash::make('1234');
		$u->save();

		$p = Peserta::find(2);
		$p->user()->save($u);

	}
}
