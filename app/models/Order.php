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
    
}