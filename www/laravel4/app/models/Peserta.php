<?php

class Peserta extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users_peserta';

	public $timestamps = false;

	public function user()
	{
		return $this->morphOne('User', 'userable');
	}

}
