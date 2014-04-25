<?php

use \Shop\Repo\Cart\Cartworker as Cartworker;

use \Shop\Repo\Coupon\CouponEloquent as CouponEloquent;

class CartTest extends TestCase {
	
	protected $coupon;
	
	protected $cart;

	public function setUp()
	{
		parent::setUp();
		
		$this->cart   = new Cartworker(new DBCart);
    	$this->coupon = new CouponEloquent(new Coupon);
		
		\Cart::add('234', 'Other product 4534', 1, 120.00, array('size' => 'M'));

	}
	
	public function tearDown(){
	
		\Cart::destroy();
			
		\Session::forget('coupon');	
	}

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testPrepProductToAddToCart()
	{
		$given  = 'name=the product&id=123&qty=2&price=10.00';
		 
		$actual = $this->cart->prepProduct($given);

		$expect = array( 'name' => 'the product' , 'id' => '123' , 'qty' => '2' , 'price' => 10.00);

		$this->assertEquals($expect, $actual);
	}
	
	public function testTotalOfCart(){
		
		$actual = $this->cart->subtotal();

		$this->assertEquals(120.00, $actual);
	}
	
	public function testUpdateOfCart(){
		
		// Get row id
		$rowId  = $this->cart->getFirstRow();
		
		// prepare update info
		$array  = array(
			'rowid'         => array($rowId),
			'item_quantity' => array(3)
		);
		
		// update the qty from 1 to 3
		$this->cart->update($array);
		
		// get count and test if the update was ok
		$items = $this->cart->totalCount();

		$this->assertEquals(3, $items);
	}
	
	public function testTotalWithCouponAndShipping(){
		
		$this->coupon->couponIsValid('promo'); // 50%
			
		// get total of cart 120 - 50% + 10 = 70
		$items = $this->cart->total(10);

		$this->assertEquals(70, $items);
		
	}

}