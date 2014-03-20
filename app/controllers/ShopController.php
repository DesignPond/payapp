<?php

class ShopController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	
		$products = array(
			1 => array( 'id' => 1 , 'title' => 'Castle'   , 'price' => '120.00' , 'image' => 'fantasy.jpg'  ),
			2 => array( 'id' => 2 , 'title' => 'Bioshock' , 'price' => '80.00'  , 'image' => 'bioshock.jpg' ),
			3 => array( 'id' => 3 , 'title' => 'Portal 2' , 'price' => '100.00' , 'image' => 'portal2.jpg'  ),
			4 => array( 'id' => 4 , 'title' => 'Fantasy'  , 'price' => '90.00'  , 'image' => 'fantasy2.jpg' )
		);
		
		return View::make('shop/index')->with( array( 'products' => $products ) );
		
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