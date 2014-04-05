<?php namespace Shop\Repo\User;

interface UserInterface {
	
	public function find( $id , $type = NULL );
	
	public function create(array $data);

}

