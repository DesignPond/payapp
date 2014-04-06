<?php namespace Shop\Repo\Order;

use Shop\Repo\Order\OrderInterface;

use Order as O;

use Order_articles as A;

class OrderEloquent implements OrderInterface {

	protected $order;

	public function __construct(O $order , A $articles)
	{
		$this->order    = $order;
		
		$this->articles = $articles;
	}
	
	/*
	* Return all orders
	*/
	public function getAll(){
		
		return $this->order->all();	
	}

	/**
	 * Return a order
	*/
	public function find($id){
				
		return $this->order->findOrFail($id);														
	}
	
	/*
	*  Make order number
	*/
	public function makeNumber(){
	
		return '001_fakeInvoiceNumber';
	}
	
	/*
	* create an order
	*/	
	public function process($cart){
	
		// Get the cart infos to process the order
		
		$order = $this->order->create(array(
			'email'          => $data['subtotal'],
			'total'          => $data['total'],
			'invoice_number' => $data['invoice_number'],
			'coupon_id'      => $data['coupon_id'],
			'user_id'        => $data['user_id'],
			'shipping_id'    => $data['shipping_id'],
			'cart_id'        => $data['cart_id'],
			'status'         => $data['status'],
			'deleted'        => 0
		));
		
		if( ! $order )
		{
			return false;
		}
		
		return true;
		
	}
	
}