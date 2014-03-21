<?php namespace Shop\Repo\Cart;

use Shop\Repo\Cart\CartInterface;

class CartWorker implements CartInterface {

	public function get(){
		
		return \Cart::content();
	}
	
	public function update($array){
	
		$rows = $array['rowid'];
		$qtys = $array['item_quantity'];
		
		foreach($rows as $key => $row)
		{			 
			\Cart::update( $row, $qtys[$key] );
		}
		
		return true;		
	}
	
	public function delete($row){
		
		return \Cart::remove($row);
		
	}
	
}