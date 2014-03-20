<?php

class PaymillController extends \BaseController {

	
	/* ===================================
		Transactions simple
	===================================== */
	
	public function transaction(){
	
		$token    = Input::get('paymillToken');
		$currency = Input::get('card-currency');
		$amount   = Input::get('card-amount-int');
		$email    = Input::get('email');
		
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
	
		
	/* ===================================
		Transactions for client
	===================================== */	
	
	public function transactionClient(){

		$token    = Input::get('paymillToken');
		$currency = Input::get('card-currency');
		$amount   = Input::get('card-amount-int');
		$client   = Input::get('clientToken');
		
		if ($token)
		{	
			// create a credit card payement with token and client id		
			$payement = Laramill::newCreditCardPayement( $token, $client );
			
			if($payement)
			{
				// Get payement id
				$paymentId = $payement->getId();
				
				// Create new transaction with payement token
				$response  = Laramill::newTransactionToken($amount, $currency , $paymentId, 'Transaction from client');
				
				return Redirect::to('clients/'.$client);
			}
			else
			{
				return Redirect::back()->with( array('status' => 'danger' , 'message' => 'Problem with transaction') );
			}
		
		}
		
		return Redirect::back()->with( array('status' => 'danger' , 'message' => 'Problem with token') );
		
	}

					

}