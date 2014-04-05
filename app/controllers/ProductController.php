<?php

use Shop\Repo\Product\ProductInterface;

class ProductController extends \BaseController {
	
	protected $product;
	

    public function __construct( ProductInterface $product )
    {
    
    	$this->product = $product;
    	
    }	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	
		$products = $this->product->getAll()->toArray();
		
		return View::make('products/index')->with( array( 'products' => $products ) );
		
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
				
		$product = $this->product->find($id)->toArray();
		
		return View::make('products/show')->with( array( 'product' => $product ) );
		
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