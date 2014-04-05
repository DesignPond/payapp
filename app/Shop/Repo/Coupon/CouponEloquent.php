<?php namespace Shop\Repo\Coupon;

use Shop\Repo\Coupon\CouponInterface;

use Coupon as M;

class CouponEloquent implements CouponInterface{

	protected $coupon;

	/**
	 * Construct a new SentryUser Object
	 */
	public function __construct(M $coupon)
	{
		$this->coupon = $coupon;
	}
	
	/*
	* Return all coupons
	*/
	public function getAll(){
		
		return $this->coupon->all();	
	}

	/**
	 * Return a coupon
	*/
	public function find($id){
				
		return $this->coupon->findOrFail($id);														
	}
		
}
