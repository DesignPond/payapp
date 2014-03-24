<?php

class User extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the adress of user
	 *
	 * @return mixed
	 */
	public function address() 
	{
		return $this->hasOne('Address' ,'user_id'); 
	}


}