<?php

use \Shop\Repo\Cart\Cartworker as Cartworker;

class CartTest extends TestCase {
	
	protected $cart;

	public function setUp()
	{
		parent::setUp();
		
		$this->cart = new Cartworker ;
	}

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testPrepProductToAddToCart()
	{
		$given  = 'name=the product&id=123&qty=2';
		 
		$actual = $this->cart->prepProduct($given);

		$expect = array( 'name' => 'the product' , 'id' => '123' , 'qty' => '2' );

		$this->assertEquals($expect, $actual);
	}

}