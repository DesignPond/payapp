<?php namespace Shop\Repo\Cart;

interface CartInterface {
	
	public function get();
	public function update($array);
	public function delete($row);

}

