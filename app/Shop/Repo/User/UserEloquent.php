<?php namespace Shop\Repo\User;

use User as M;

use Shop\Repo\User\UserInterface;

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
	public function find( $id , $type = NULL ){
				
		$user = $this->user->where('id','=',$id);
		
		if($type){
		
			$user->with( array('address'=> function($query) use ($type){
				$query->where('type','=',$type);
			} ));
		}
		else
		{
			$user->with('address');
		}
		
		return $user->get()->first();																
	}
	
	public function create(array $data){
	
		$user = $this->user->create(array(
			'first_name' => $data['first_name'],
			'last_name'  => $data['last_name'],
			'email'      => $data['email'],
			'created_at' => date('Y-m-d G:i:s'),
			'updated_at' => date('Y-m-d G:i:s')
		));
		
		if( ! $user )
		{
			return false;
		}
		
		return $user;
	}
}
