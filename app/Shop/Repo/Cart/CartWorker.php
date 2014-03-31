<?php namespace Shop\Repo\Cart;

use Shop\Repo\Cart\CartInterface;

class CartWorker implements CartInterface {

	/*
	 * Get cart infos
	*/	
	public function get(){
		
		return \Cart::content();
	}

	/*
	 * Add row in cart
	*/		
	public function add($array){
		
		\Cart::add( $array );
		
		return true;	
	}

	/*
	 * Update row in cart
	*/		
	public function update($array){
	
		$rows = $array['rowid'];
		$qtys = $array['item_quantity'];
		
		foreach($rows as $key => $row)
		{			 
			\Cart::update( $row, $qtys[$key] );
		}
		
		return true;		
	}

	/*
	 * Delete row in cart
	*/		
	public function delete($row){
		
		 \Cart::remove($row);
		 
		 return true;		
	}

	/*
	 * Calcul total 
	*/	
	public function subtotal(){
			
		return \Cart::total();	
	}
	
	/*
	 * Calcul subtotal with coupon if exist
	*/	
	public function total( $shipping ){
			
		$total    = \Cart::total();	
		$subtotal = \Cart::total();	
		$coupon   = \Session::get('coupon');
		
		if( !empty($coupon) && $total != 0 )
		{			
			$subtotal = $total - ( $total * $coupon );			
		}		
	
		if( \Session::has('shipping_option') && $total != 0 )
		{
		 	$shipping_option = Session::get('shipping_option'); 
        	$shippingPrice   = $shipping[$shipping_option]['price'];
        	
        	$subtotal = $subtotal + $shippingPrice;
        }
		
		return $subtotal;
		
	}
	
	/**
	 * Coupon code is valid
	 */
	public function couponIsValid($coupon)
	{	
		$coupons = array( 'ISVALID' => '0.1' , '2014' => '0.2' );
	
		if( array_key_exists($coupon, $coupons) )
		{
			\Session::put('coupon', $coupons[$coupon]);			
			return true;			
		}
		
		return false;
	}	

	/*
	 * Prepare infos from form sent to add to cart
	*/		
	public function prepProduct($string){
						
		$serializedData   = $string;
		$unserializedData = array();
		
		parse_str($serializedData,$unserializedData);
		
		return $unserializedData;
		
	}
	
}