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
        
        View::share('countries',  \Countries::all()->lists('country_name','id') );
		
		View::share('subtotal', $this->cart ->subtotal() );
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
		
		return View::make('checkout.method')->with( array('shipping' => $shipping) );
	}
	
	public function methodPayment(){
		
		$shippingOption = Input::get('shipping_option');
		
		if(!empty($shippingOption))
		{
			
			Session::put('shipping_option', $shippingOption );			
		}
		
		return View::make('checkout.payement');
	}	

	public function reviewOrder(){
						
		$payementOption = Input::get('payement_option');
		
		if(!empty($payementOption))
		{
			
			Session::put('payement_option', $payementOption );			
		}
		
		return View::make('checkout.review');
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