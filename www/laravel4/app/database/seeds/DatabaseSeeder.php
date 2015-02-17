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

		$this->call('QTypeTableSeeder');
		$this->command->info('QType table seeded!');

		$this->call('QuestionTableSeeder');
		$this->command->info('Question table seeded!');
	}

}

class ParticipantTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		DB::table('users_participant')->delete();

		$now = Carbon::now();

		Participant::insert([
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

class QTypeTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('qtypes')->delete();

		$u = new QType;
		$u->name = 'Matematika';
		$u->save();

    $u = new QType;
		$u->name = 'Fisika';
		$u->save();

    $u = new QType;
		$u->name = 'Komputer';
		$u->save();
    }
}

class QuestionTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('questions')->delete();

		$now = Carbon::now();

		Question::insert([
			[
				'qtype_id' => 1,
				'question' => 'Berapakah 1 + 1?',
				'image'    => 'https://presbyterianblues.files.wordpress.com/2012/06/1-1-2.jpg',
				'chA'			 => '2',
				'chB'			 => '3',
				'chC'			 => '4',
				'chD'			 => '5',
				'chE'			 => '6',
				'randomize' => true,
				'answer'   => 'A',
				'created_at' => $now,
				'updated_at' => $now
			],
			[
				'qtype_id' => 1,
				'question' => 'Berapakah 3 + 6?',
				'image'    => 'http://janbrett.com/images/addition_flash3+3=6.jpg',
				'chA'			 => '10',
				'chB'			 => '9',
				'chC'			 => '8',
				'chD'			 => '7',
				'chE'			 => '6',
				'randomize' => true,
				'answer'   => 'B',
				'created_at' => $now,
				'updated_at' => $now
			]
		]);
	}
}