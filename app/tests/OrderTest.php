<?php

use \Shop\Repo\Order\OrderEloquent as OrderEloquent;

class OrderTest extends TestCase {
	
	protected $order;

	protected $mock;
		
	protected $collection;

	public function setUp()
	{
		parent::setUp();

	    $this->mock = $this->mock('Shop\Repo\Order\OrderInterface');
	    
	    $this->order = new OrderEloquent(new Order , new Order_articles);
	    
	    $this->collection = Mockery::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();

	}
	 
	public function mock($class)
	{
	    $mock = Mockery::mock($class);
	 
	    $this->app->instance($class, $mock);
	 
	    return $mock;
	}
 	
	public function tearDown()
    {
    	\Mockery::close();
    }
	
	/**
	 * test create new invoice number
	*/	 
	public function testCreateNewInvoiceNumber()
	{	
		$actual = $this->order->makeInvoiceNumber('0003');
		
		$expect = '0004';
		
		$this->assertEquals($expect, $actual);	
	}

	
	/**
	 * test create new invoice number
	*/	 
/*
	public function testCreateNewInvoiceNumber()
	{	
		$this->mock->shouldReceive('delete')->once()->andReturn(true);
	    
		$this->call('get', 'admin/adresses/removeSpecialisation', array( 'id' => 1 ) );
 
		$this->assertRedirectedTo('admin/adresses/2', array('status' => 'success' ));	
	}
*/

}