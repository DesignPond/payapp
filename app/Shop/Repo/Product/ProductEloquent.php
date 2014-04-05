<?php namespace Shop\Repo\Product;

use Shop\Repo\Product\ProductInterface;

use Product as M;

class ProductEloquent implements ProductInterface {

	protected $product;

	public function __construct(M $product)
	{
		$this->product = $product;
	}

	/*
	* Return all products
	*/
	public function getAll(){
		
		return $this->product->all();	
	}

	/**
	 * Return a product
	*/
	public function find($id){
				
		return $this->product->findOrFail($id);														
	}
		
}