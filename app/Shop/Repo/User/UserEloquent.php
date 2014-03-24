<?php namespace Shop\Repo\User;

use User as M;

class UserEloquent implements UserInterface{

	protected $user;

	/**
	 * Construct a new SentryUser Object
	 */
	public function __construct(M $user)
	{
		$this->user = $user;
	}

	/**
	 * Return all infos of the user with insciption
	 *
	 * @return stdObject Collection of users
	 */
	public function find($id){
				
		return $this->user->where('id','=',$id)->with('address')->get()->first();														
	}
		
}
