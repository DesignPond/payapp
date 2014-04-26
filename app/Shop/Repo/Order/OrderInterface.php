<?php namespace Shop\Repo\Order;

interface OrderInterface {
	
	public function getAll();

	public function find($id);
	
	public function process($data);

	public function newInvoiceNumber();
	
}

