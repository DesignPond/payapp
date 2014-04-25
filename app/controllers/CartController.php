<?php

use Shop\Repo\Cart\CartInterface;

use Shop\Repo\Coupon\CouponInterface;

use Shop\Repo\Shipping\ShippingInterface;

class CartController extends \BaseController {

	protected $cart;
	
	protected $coupon;
	
	protected $shipping;
	
	public function __construct( CartInterface $cart , CouponInterface $coupon, ShippingInterface $shipping){
		
		$this->cart     = $cart;
		
		$this->coupon   = $coupon;
		
		$this->shipping = $shipping;

		$shipping = $this->shipping->getAll()->toArray();
		
		View::share('shipping', $shipping );
				
		// shipping total				
		$shippingPrice = $this->shipping->getShippingPrice();

		// Total of cart
		$cartSubTotal  = $this->cart->subtotal();
		$cartTotal     = $this->cart->total($shippingPrice);
		
		View::share('subtotal', $cartSubTotal );
		View::share('total', $cartTotal );

		$coupons = $this->coupon->getAll()->lists('value','name');
		
		$coupons = array_flip($coupons);
		
		View::share('coupons', $coupons );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cart = $this->cart->get();		
		
		return View::make('cart.index')->with( array( 'cart' => $cart ) );
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
		
		if( $this->coupon->couponIsValid($coupon) )
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