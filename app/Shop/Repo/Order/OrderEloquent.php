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
				
		return $this->order->where('id','=',$id)->with( array('user') )->get()->first();														
	}
	
	/*
	*  Get last invoice number
	*/	
	public function lastInvoiceNumber(){
	
		$last = 0;
		
		// Last invoice number
		$number = $this->order->orderBy('id', 'DESC')->take(1)->skip(0)->get();
		
		if(! $number->isEmpty()) 
		{					
			$last  = explode('_', $number);
		}
		
		return $last;
	}
	
	/*
	*  Make invoice number
	*/
	public function makeInvoiceNumber($last){
		
		$new  = intval($last) + 1;
					
		$new  = str_pad($new, 4, '0', STR_PAD_LEFT);	
		
		return $new;
	}
		
	/*
	*  Return new invoice number
	*/
	public function newInvoiceNumber(){
		
		$last = $this->lastInvoiceNumber();
		
		$new  = $this->makeInvoiceNumber($last);
		
		$year = date('Y');
					
		$invoiceNumber  = $new.'_'.$year;	
		
		return $invoiceNumber;
	}
	
	/*
	* create an order
	*/	
	public function process($data){
	
		// Get the cart infos to process the order		
		$order = $this->order->create(array(
			'subtotal'       => $data['subtotal'],
			'total'          => $data['total'],
			'invoice_number' => $data['invoice_number'],
			'coupon_id'      => $data['coupon_id'],
			'user_id'        => $data['user_id'],
			'shipping_id'    => $data['shipping_id'],
			'cart_id'        => $data['cart_id']
		));
		
		if( ! $order )
		{
			return false;
		}
		
		return $order;
		
	}
	
}