<?php

class PaymillController extends \BaseController {


	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$offers = Laramill::getListOffer();
		
		return View::make('offers.index')->with( array( 'offers' => $offers ) );			
		
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
		$client   = Input::get('clientToken');
		
		if ($token) 
		{				
			$payement = Laramill::newCreditCardPayement( $token, $client );

			if($payement)
			{
				$paymentId = $payement->getId();
				
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
	
	/* ===================================
		Offers subscription
	===================================== */
	
	// show offer
	
	public function offer($offer){
	
		$offer = Laramill::getOffer($offer);
		
		return View::make('offers.show')->with( array( 'offer' => $offer ) );

	}
	// create offer
	
	public function newOffer(){
	
		$amount   = Input::get('amount');
		$amount   = $amount * 100;
		$currency = Input::get('currency');
		$name     = Input::get('name');
		$interval = Input::get('interval');
					
		$offer = Laramill::newOffer( $amount, $currency, $interval, $name , null);

		if($offer)
		{			
			return Redirect::to('paymill');
		}

		return Redirect::back()->with( array('status' => 'danger' , 'message' => 'Problem with creation') ); 

	}
	
	// delete offer
	
	public function deleteOffer($offer){
	
		$deleted = Laramill::removeOffer( $offer );

		if($deleted)
		{			
			return Redirect::to('paymill');
		}

		return Redirect::back()->with( array('status' => 'danger' , 'message' => 'Problem with delete') ); 
		
	}


}