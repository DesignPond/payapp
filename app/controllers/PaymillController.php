<?php

class PaymillController extends \BaseController {


	/**
	 * Display the specified resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

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

	}
	
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

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}