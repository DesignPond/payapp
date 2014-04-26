<?php

use Shop\Repo\Order\OrderInterface;

class PaymentController extends \BaseController {

	protected $order;
	
	public function __construct( OrderInterface $order ){
		
		$this->order = $order;			
	}
	
	/**
	 * Display a listing of the resource.
	 * GET /payment
	 *
	 * @return Response
	 */
	public function show($id)
	{
		//  order
		/*
			$order = array(
				'subtotal'       => $cartSubTotal,
				'total'          => $cartTotal,
				'invoice_number' => $invoice_number,
				'coupon_id'      => $coupon,
				'user_id'        => $user['user_id'],
				'shipping_id'    => $shipping,
				'cart_id'        => $dbcart->id
			);
		*/
		
		$order = $this->order->find($id);
		
		return View::make('payment.paymill')->with( array( 'order' => $order ) );	
	}

	/**
	 * Store Transactions simple
	 * POST /payment
	 *
	 * @return Response
	 */
	public function store()
	{
	
		$token    = Input::get('paymillToken');
		$currency = Input::get('card-currency');
		$amount   = Input::get('card-amount-int');
		$email    = Input::get('email');
		$invoice  = Input::get('invoice');
		
		// Create client with email			
		$client   = Laramill::newClient( $email );

		if($client)
		{			
			// Get lcient id
			$clientId = $client->getId();
		
			if ($token && $clientId) 
			{	
				// create a credit card payement with token and client id		
				$payement = Laramill::newCreditCardPayement( $token, $clientId );
	
				if($payement)
				{
					// Get payement id
					$paymentId = $payement->getId();
					
					// Create new transaction with payement token
					$response  = Laramill::newTransactionToken($amount, $currency , $paymentId, $invoice);
					
					return Redirect::to('clients/'.$clientId);
				}
				else
				{
					return Redirect::back()->with( array('status' => 'danger' , 'message' => 'Problem with transaction') ); 
				}	
				
			} // end if client & token		
		}
		
		return Redirect::back()->with( array('status' => 'danger' , 'message' => 'Problem with token') ); 
	}

}