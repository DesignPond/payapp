<?php namespace Shop\Repo\Coupon;

interface CouponInterface{
	
	public function getAll();
	public function find($id);
	public function couponIsValid($coupon);
}

