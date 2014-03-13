<?php

class ClientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
				
		$listClients = Laramill::getListClient($count = NULL, $offset = NULL, $creditcard = NULL, $email = NULL, $created_at = NULL);
		
		return View::make('clients.index')->with( array( 'listClients' => $listClients ) );		
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
		//
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
		$transactions = Laramill::getListTransaction($id);
		
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