<?php namespace Shop\Repo\Address;

use Address as M;

use Shop\Repo\Address\AddressInterface;

class AddressEloquent implements AddressInterface{

	protected $address;

	/**
	 * Construct a new SentryUser Object
	 */
	public function __construct(M $address)
	{
		$this->address = $address;
	}

	/**
	 * Return all infos of the user with insciption
	 *
	 * @return stdObject Collection of users
	 */
	public function find( $id ){
				
		return $this->address->findOrFail($id);													
	}
	
	public function create(array $data){

		$address = $this->address->create(array(
			'title'      => $data['title'],
			'first_name' => $data['first_name'],
			'last_name'  => $data['last_name'],
			'email'      => $data['email'],
			'company'    => $data['company'],
			'phone'      => $data['phone'],
			'address'    => $data['address'],
			'zip'        => $data['zip'],
			'city'       => $data['city'],
			'country'    => $data['country'],
			'type'       => $data['type'],
			'user_id'    => $data['user_id'],
			'deleted'    => 0,
			'created_at' => date('Y-m-d G:i:s'),
			'updated_at' => date('Y-m-d G:i:s')
		));
		
		if( ! $address )
		{
			return false;
		}
		
		return true;		
	}
		
}

