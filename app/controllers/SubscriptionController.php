<?php

class SubscriptionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	
		$subscription = Laramill::getListSubscription();
		
		return View::make('subscriptions.index')->with( array( 'subscriptions' => $subscription ) );	
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$offers  = Laramill::getListOffer();
		$clients = Laramill::getListClient();
		
		return View::make('subscriptions.create')->with( array( 'offers' => $offers  , 'clients' => $clients ) );
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
		$client   = Input::get('client');
		$offer    = Input::get('offer');
		
		if ($token) 
		{				
			$payement = Laramill::newCreditCardPayement( $token, $client );

			if($payement)
			{
				$paymentId = $payement->getId();
				
				$response  = Laramill::newSubscription($client, $offer, $paymentId);
				
				return Redirect::to('subscriptions');
			}
			else
			{
				return Redirect::back()->with( array('status' => 'danger' , 'message' => 'Problem with subscription') ); 
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
	
		$subscription = Laramill::getSubscription($id);
		
		return View::make('subscriptions.show')->with( array( 'subscription' => $subscription ) );
		
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
		$deleted = Laramill::removeSubscription( $id );

		if($deleted)
		{			
			return Redirect::to('subscriptions');
		}

		return Redirect::back()->with( array('status' => 'danger' , 'message' => 'Problem with delete') ); 
	}

}