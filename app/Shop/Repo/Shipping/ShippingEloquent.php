<?php namespace Shop\Repo\Shipping;

use Shipping as M;

class ShippingEloquent implements ShippingInterface{

	protected $shipping;

	/**
	 * Construct a new SentryUser Object
	 */
	public function __construct(M $shipping)
	{
		$this->shipping = $shipping;
	}
	
	/*
	* Return all shippings
	*/
	public function getAll(){
		
		return $this->shipping->all();	
	}

	/**
	 * Return all shippings
	 *
	 * @return stdObject Collection of users
	 */
	public function find($id){
				
		return $this->shipping->findOrFail($id);														
	}
		
}
