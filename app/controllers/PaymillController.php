<?php

class PaymillController extends \BaseController {


	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return View::make('index');			
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

/*
		$token    = Input::get('paymillToken');
		$currency = Input::get('card-currency');
		$amount   = Input::get('card-amount-int');
		$client   = 'client_aac766c78002f4d315a0';
		$cc       = 'pay_dba1845355d9f7a2958e89f6';
		
		if ($token) 
		{
			$response = Laramill::newTransactionToken(1600, 'CHF', $cc, ' transaction from form');
			// $response = Laramill::newCreditCardPayement( $token, $client );
			$paymentId = $response->getId();
		    print_r($paymentId);		    
		}
*/

	}
	
	
	/* ===================================
		Transactions
	===================================== */
	
	public function transaction(){
	
		$token    = Input::get('paymillToken');
		$currency = Input::get('card-currency');
		$amount   = Input::get('card-amount-int');
		$email    = Input::get('email');
					
		$client   = Laramill::newClient( $email );

		if($client)
		{			
			
			$clientId = $client->getId();
		
			if ($token && $clientId) 
			{	
						
				$payement = Laramill::newCreditCardPayement( $token, $clientId );
	
				if($payement)
				{
					$paymentId = $payement->getId();
					
					$response  = Laramill::newTransactionToken($amount, $currency , $paymentId, 'Transaction from client');
					
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