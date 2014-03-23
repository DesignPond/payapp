<?php

use Shop\Service\Validation\UserValidation as UserValidation;

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Init validator
		$userValidation = UserValidation::make( Input::all() );
		
		if ($userValidation->passes()) 
		{
			if (Auth::attempt(array('email' => Input::get('email') , 'password' => Input::get('password') )))
			{
		   		return Redirect::to('checkout');
			}
			
			return Redirect::back()->with( array('status' => 'error' , 'message' => 'Login failed') )->withInput( Input::all() ); 
		}
		
		return Redirect::back()->withErrors( $userValidation->errors() )->withInput( Input::all() ); 
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