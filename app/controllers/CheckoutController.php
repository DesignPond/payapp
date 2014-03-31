<?php

use Shop\Repo\User\UserInterface;

use Shop\Repo\Cart\CartInterface;

class CheckoutController extends \BaseController {

	protected $user;
	
	protected $cart;

    public function __construct( UserInterface $user , CartInterface $cart )
    {
        $this->beforeFilter('cartNotEmpty');
        
        $this->user = $user;
        
		$this->cart = $cart;
        
        // trick from db
        View::share('countries',  \Countries::all()->lists('country_name','id') );
		
		$shipping = array(
			1 => array( 'name' => 'PostPac Priority' ,'description' => 'Delivered to your letterbox within 1 working day' , 'price' => '9' ),
			2 => array( 'name' => 'MiniPac International Priority' ,'description' => 'Delivered to your letterbox within 10 working day' , 'price' => '50' )
		);
		
		// trick from db
		View::share('shipping', $shipping );
		
		// trick from db
		$coupons  = array( 'ISVALID' => '0.1' , '2014' => '0.2' );
		
		View::share('coupons', $coupons );
		
		/* 
		 *	Cart subtotal products * qty : $cartSubTotal
		 *	Cart total value after coupon and delivery costs: $cartTotal
		 *	Coupon name and value $namecoupon , $valuecoupon
		 *  Shipping costs: $shippingPrice		 
		*/ 
		
		// Total of cart
		$cartSubTotal = $this->cart->subtotal();
		$cartTotal    = $this->cart->total($shipping);
		
		$shippingPrice = NULL;
		$namecoupon    = NULL;
		$valuecoupon   = NULL;
        
        if(Session::has('coupon'))
        {        				
			$coupon = Session::get('coupon'); 
			
			if( in_array( $coupon , $coupons ) )
			{ 	
				$values      = array_flip($coupons);
				$valuecoupon = $coupon * 100;
				$namecoupon  = $values[$coupon];														
			} 							
		}

		View::share('cartSubTotal' , $cartSubTotal);
		View::share('cartTotal'    , $cartTotal);
		View::share('shippingPrice', $shippingPrice);
		View::share('namecoupon'   , $namecoupon);
		View::share('valuecoupon'  , $valuecoupon);
		
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
		   
		   return View::make('checkout.user.billing')->with( array('user' => $user) );
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
		if (Auth::check())
		{
		   $id   = Auth::user()->id;
		   
		   $user = $this->user->find($id);
		   
		   return View::make('checkout.user.shipping')->with( array('user' => $user) );
		}
		
		if(!empty($_POST) && !Session::has('user.billing') ){
			// put client billing info in session
			Session::push('user.billing', Input::all() );			
		}
		
		return View::make('checkout.shipping');
	}
	
	public function copyBilling(){
	
		if( Session::has('user.billing') )
		{
			// put client billing info as shipping infos in session
			$billing = Session::get('user.billing');
			Session::push('user.shipping', $billing[0] );		
		}
		
		return Redirect::to('checkout/shipping');
	}
	
	public function methodShipping(){
	
		$shipping = array(
			1 => array( 'name' => 'PostPac Priority' ,'description' => 'Delivered to your letterbox within 1 working day' , 'price' => 'CHF 9' ),
			2 => array( 'name' => 'MiniPac International Priority' ,'description' => 'Delivered to your letterbox within 10 working day' , 'price' => 'CHF 50' )
		);
	
		if(!empty($_POST)){
		
			Session::forget('user.shipping');
			// put client billing info in session
			Session::push('user.shipping', Input::all() );			
		}
		
		return View::make('checkout.method');
	}
	
	public function methodPayment(){
				
		$shippingOption = Input::get('shipping_option');
		
		if( !Session::has('shipping_option') )
		{	
			if( empty($shippingOption) )
			{
				return Redirect::to('checkout/methodShipping')->with( array('status' => 'error' ,'message' => 'Please choose a shipping method') );	
			}
			else
			{
				Session::forget('shipping_option');
				Session::put('shipping_option', $shippingOption );	
			}							
		}
		
		if($shippingOption)
		{
			Session::forget('shipping_option');
			Session::put('shipping_option', $shippingOption );	
		}				
		
		return View::make('checkout.payement');
	}	

	public function reviewOrder(){
						
		$payementOption = Input::get('payement_option');

		if( !Session::has('payement_option') )
		{	
			if(empty($payementOption))
			{			
				return Redirect::to('checkout/methodPayment')->with( array('status' => 'error' ,'message' => 'Please choose a payment method') );					
			}
			else
			{
				Session::forget('payement_option');
				Session::put('payement_option', $payementOption );	
			}				
		}
		if($payementOption)
		{
			Session::forget('payement_option');
			Session::put('payement_option', $payementOption );	
		}							
	
		$cart = $this->cart->get();	
		
		return View::make('checkout.review')->with( array('cart' => $cart ) );
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