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
	
	/*
	* Return all shippings
	*/
	public function getShippingPrice(){
		
		$shippingPrice = 0;
	
		if( \Session::has('shipping_option') )
		{		
			$id              = \Session::get('shipping_option');			
			$shipping        = $this->shipping->findOrFail($id)->toArray();
        	$shippingPrice   = $shipping['price'];
        }
        
        return $shippingPrice;
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
