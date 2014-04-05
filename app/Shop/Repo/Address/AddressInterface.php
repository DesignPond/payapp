<?php namespace Shop\Repo\Address;

interface AddressInterface {
	
	public function find( $id );
	
	public function create(array $data);

}

