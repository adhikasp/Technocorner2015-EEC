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

		$this->call('ParticipantTableSeeder');
		$this->command->info('Participant table seeded!');

		$this->call('AdminTableSeeder');
		$this->command->info('Admin table seeded!');
	}

}

class ParticipantTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users_participant')->delete();

		Participant::create([
			'id' 					 => 1,
			'team_name'     => 'Technocorner Dummy Team 4EVER',
			// 'email'        => 'adhika.setyap@gmail.com',
			// 'password'     => Hash::make('1234'),

			'member_1'    => 'Dhika',
			'member_2'    => 'Roni',
			'member_3'    => 'Charlie',

			'school' => 'SMA N 3 Yogyakarta'
		]);
		Participant::create([
			'id' 					 => 2,
			'team_name'     => 'Another Dummy',
			// 'email'        => 'dummy@technocornerugm.com',
			// 'password'     => Hash::make('1234'),

			'member_1'    => 'Tion',
			'member_2'    => 'Budi',
			'member_3'    => 'Anggoro',

			'school' => 'SMA N 1 Bangka',
		]);

		$u = new User;
		$u->email = 'dhika_sp@yahoo.com';
		$u->password = Hash::make('1234');
		$u->save();

		$p = Participant::find(1);
		$p->user()->save($u);

		$u = new User;
		$u->email = 'dummy@technocornerugm.com';
		$u->password = Hash::make('1234');
		$u->save();

		$p = Participant::find(2);
		$p->user()->save($u);
	}
}

class AdminTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users_admin')->delete();

		$u = new User;
		$u->email = 'adhika.setyap@gmail.com';
		$u->password = Hash::make('1234');
		$u->save();

		$a = new Admin;
		$a->name = 'Adhika Setya Pramudita';
		$a->save();

		$a->user()->save($u);

        $u = new User;
		$u->email = 'abdillah96bu@gmail.com';
		$u->password = Hash::make('1234');
		$u->save();

		$a = new Admin;
		$a->name = 'Hernawan Fa\'iz Abdillah';
		$a->save();

		$a->user()->save($u);
    }
}
