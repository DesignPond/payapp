<?php namespace Shop\Repo\Cart;

interface CartInterface {
	
	public function get();
	public function add($array);
	public function update($array);
	public function delete($row);
	
	// coupon utils
	public function total($shipping);
	public function subtotal();
	public function couponIsValid($coupon);
	
	// Utils for javascript
	public function prepProduct($array);

}

