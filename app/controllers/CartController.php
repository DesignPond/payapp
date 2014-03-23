<?php

use Shop\Repo\Cart\CartInterface;

class CartController extends \BaseController {

	protected $cart;
	
	public function __construct( CartInterface $cart ){
		
		$this->cart    = $cart;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cart     = $this->cart->get();		
		$subtotal = $this->cart->subtotal();
		
		$coupons  = array( 'ISVALID' => '0.1' , '2014' => '0.2' );
		
		$shipping = array(
			1 => array( 'name' => 'PostPac Priority' ,'description' => 'Delivered to your letterbox within 1 working day' , 'price' => 'CHF 9' ),
			2 => array( 'name' => 'MiniPac International Priority' ,'description' => 'Delivered to your letterbox within 10 working day' , 'price' => 'CHF 50' )
		);
		
		return View::make('cart/index')->with( array( 'cart' => $cart , 'subtotal' => $subtotal , 'coupons' => $coupons , 'shipping' => $shipping ) );
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
		return $this->cart->update( Input::all() );		
	}

	/**
	 * Add to cart
	 *
	 * @return Response
	 */
	public function addToCart()
	{
		$string  = $_POST['data'];		
		$product = $this->cart->prepProduct($string);
		
		if( $this->cart->add( $product ) )
		{
			echo json_encode(array( 'result' => true ));
		}		
	}

	/**
	 * Apply coupon code
	 *
	 * @return Response
	 */
	public function applyCouponCode()
	{
		$coupon = Input::get('coupon');
		
		if( $this->cart->couponIsValid($coupon) )
		{					
			return Redirect::to('cart')->with(array( 'status' => 'success', 'message' => 'Coupon applied!' ));
		}
		
		return Redirect::to('cart')->with(array( 'status' => 'error' ,'message' => 'Coupon not valid' ));
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
	public function update()
	{
		
		// else update the cart
		$this->cart->update( Input::all() );
		
		return Redirect::to('cart');
	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($row)
	{
		$this->cart->delete($row);
		
		return Redirect::to('cart');
	}

}