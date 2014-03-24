<?php

use Shop\Repo\User\UserInterface;

class CheckoutController extends \BaseController {

	protected $user;

    public function __construct( UserInterface $user )
    {
        $this->beforeFilter('cartNotEmpty');
        
        $this->user = $user;
    }
    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check())
		{
		   return Redirect::to('checkout/billing');
		}
		
		return View::make('checkout.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function billing()
	{	
		if (Auth::check())
		{
		   $id   = Auth::user()->id;
		   
		   $user = $this->user->find($id);
		   
		   return View::make('checkout.billing')->with( array('user' => $user) );
		}
		
		return View::make('checkout.billing');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function shipping()
	{
		return View::make('checkout.shipping');
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