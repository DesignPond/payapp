<?php namespace Shop\Repo\Cart;

interface CartInterface {
	
	public function get();
	public function totalCount();
	public function getRow($row);
	public function add($array);
	public function update($array);
	public function delete($row);
	public function store($data);
	
	public function total($shipping);
	public function subtotal();
	public function destroy();
		
	// Utils for javascript
	public function prepProduct($array);

}

