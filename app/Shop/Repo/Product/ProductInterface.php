<?php namespace Shop\Repo\Product;

interface ProductInterface {
	
	public function getAll();
	
	public function find($id);

}

