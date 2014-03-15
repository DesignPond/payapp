<?php

class OfferController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	
		$offers = Laramill::getListOffer();
		
		return View::make('offers.index')->with( array( 'offers' => $offers ) );	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('offers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	
		$amount   = Input::get('amount');
		$amount   = $amount * 100;
		$currency = Input::get('currency');
		$name     = Input::get('name');
		$interval = Input::get('interval');
					
		$offer = Laramill::newOffer( $amount, $currency, $interval, $name , null);

		if($offer)
		{			
			return Redirect::to('offers');
		}

		return Redirect::back()->with( array('status' => 'danger' , 'message' => 'Problem with creation') ); 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	
		$offer = Laramill::getOffer($id);
		
		return View::make('offers.show')->with( array( 'offer' => $offer ) );
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
	
		$name  = Input::get('name');
		$id    = Input::get('id');
		
		$offer = Laramill::updateOffer($id , $name);

		if($offer)
		{			
			return Redirect::to('offers/'.$id);
		}

		return Redirect::back()->with( array('status' => 'danger' , 'message' => 'Problem with update') ); 
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	
		$deleted = Laramill::removeOffer( $id );

		if($deleted)
		{			
			return Redirect::to('offers');
		}

		return Redirect::back()->with( array('status' => 'danger' , 'message' => 'Problem with delete') ); 
	}

}