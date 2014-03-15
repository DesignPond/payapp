<?php

class ClientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
				
		$clients = Laramill::getListClient($count = NULL, $offset = NULL, $creditcard = NULL, $email = NULL, $created_at = NULL);
		
		return View::make('clients.index')->with( array( 'clients' => $clients ) );		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('clients.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$email       = Input::get('email');
		$description = Input::get('description');
					
		$client = Laramill::newClient($email , $description );

		if($client)
		{			
			return Redirect::to('clients');
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
		$client       = Laramill::getClient($id);
		$transactions = Laramill::getListTransaction( $id , NULL, NULL , NULL );
		
		return View::make('clients.show')->with( array( 'client' => $client , 'transactions' => $transactions ) );	
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function transaction($id)
	{
		$client = Laramill::getClient($id);
		
		return View::make('clients.transaction')->with( array( 'client' => $client ) );	
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
	public function update()
	{
		$id          = Input::get('id');
		$email       = Input::get('email');
		$description = Input::get('description');
					
		$client = Laramill::updateClient( $id , $email , $description );

		if($client)
		{			
			return Redirect::to('clients/'.$id);
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
		$deleted = Laramill::removeClient( $id );

		if($deleted)
		{			
			return Redirect::to('clients');
		}

		return Redirect::back()->with( array('status' => 'danger' , 'message' => 'Problem with delete') ); 
	}

}