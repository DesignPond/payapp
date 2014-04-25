<?php namespace Shop\Repo\User;

interface UserInterface {
	
	public function find( $id , $type = NULL );
	
	public function getCurrentUserId();
	
	public function getCurrentUserEmail();
	
	public function create(array $data);

}

