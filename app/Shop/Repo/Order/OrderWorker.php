<?php namespace Shop\Repo\Order;

use Shop\Repo\Order\OrderInterface;

class OrderWorker implements OrderInterface {

	/*
	 * Get cart infos
	*/	
	public function getAll(){
		
		return \Cart::content();
	}

	
}