<?php namespace Shop\Repo\Cart;

use Shop\Repo\Cart\CartInterface;

use DBCart as M;

class CartWorker implements CartInterface {

	protected $dbcart;

	public function __construct(M $dbcart)
	{
		$this->dbcart = $dbcart;
	}
	
	/*
	 * Get cart infos
	*/	
	public function get(){
		
		return \Cart::content();
	}
	
	public function totalCount(){
	
		return \Cart::count(); 
	}
	
	/*
	 * Get row id
	*/
	public function getRow($row){
		
		return \Cart::get($row);
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
	 * Destroy cart
	*/
	public function destroy(){
		
		\Cart::destroy();
		
		return true;
	}
	
	/*
	 * store the cart 
	*/
	public function store( $data ){
	
		$dbcart = $this->dbcart->create(array(
			'cart_content' => $data['cart_content'],
			'user_id'      => $data['user_id'],
			'status'       => 'active',
			'created_at'   => date('Y-m-d G:i:s'),
			'updated_at'   => date('Y-m-d G:i:s')
		));
		
		if( ! $dbcart )
		{
			return false;
		}
		
		return $dbcart;	
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
	public function total( $shipping = NULL ){
			
		(float)$total    = \Cart::total();	
		(float)$subtotal = \Cart::total();	
		(float)$coupon   = \Session::get('coupon');
		
		if( !empty($coupon) && $total != 0 )
		{			
			$subtotal = $total - ( $total * $coupon );			
		}		
	
		if( $shipping && $total != 0 )
		{      	
        	$subtotal = $subtotal + (float)$shipping;
        }
        
        $subtotal = round($subtotal , 2); 
		
		return $subtotal;
		
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
	
	/*
	 * Get first row for testing
	*/
	
	public function getFirstRow(){
	
		$cart = $this->get();
		
		if($cart)
		{
			foreach($cart as $row)
			{				
				$rowId = $row->rowid;
				break;				
			}
			
			return $rowId;
		}
		
		return false;
	}
	
}