<?php

class Order extends \Eloquent {

	protected $guarded   = array('id');
	public static $rules = array();
	
	/**
	* Activate soft delete
	*
	* @var boolean
	*/	
	protected $softDelete = true;
	
	
	public function user()
    {
        return $this->belongsTo('User','user_id');
    }

	
	public function shipping()
    {
        return $this->belongsTo('Shipping','shipping_id');
    }
        
}