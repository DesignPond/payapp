<?php

use Shop\Repo\Cart\CartInterface;
use Shop\Repo\Order\OrderInterface;
use Shop\Repo\User\UserInterface;
use Shop\Repo\Address\AddressInterface;
use Shop\Repo\Shipping\ShippingInterface;

use Shop\Service\Validation\AdresseValidator as AdresseValidator;
use Shop\Service\Validation\UserValidation as UserValidation;

class OrderController extends \BaseController {

	protected $cart;

	protected $order;
	
	protected $shipping;
	
	protected $user;
	
	protected $transaction;
	
	public function __construct( CartInterface $cart , OrderInterface $order , ShippingInterface $shipping , UserInterface $user , AddressInterface $address ){
		
		$this->cart        = $cart;
		
		$this->order       = $order;
		
		$this->shipping    = $shipping;
				
		$this->user        = $user;
		
		$this->address     = $address;	
		
		$this->transaction = '';			
			
	}
	
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
		
		Log::info('Start order process');
		/* =============================
		   User infos	
		 ============================= */	
		 	
		$user = $this->getUserInfo();
		
		Log::info('Get user infos');
		/* =============================
		   Cart store
		 ============================= */	
		 
		$dbcart = $this->storeCart($user);

		Log::info('Store cart in DB');		
		/* =============================
		   Prepare order
		 ============================= */	

		$order = $this->storeOrder($user,$dbcart); 

		Log::info('Process order');	
			
		echo '<pre>';
		print_r($order);
		echo '</pre>';
		
	}

	/**
	 *  User infos	
	 *
	 * @return array
	 */
	public function storeOrder($user,$dbcart)
	{		 
		// shipping total				
		$shippingPrice  = $this->shipping->getShippingPrice();
		$shipping       = \Session::get('shipping_option');
		
		// coupon
		$coupon         = (Session::has('coupon') ? Session::get('coupon') : '' );
		
		// Total of cart
		$cartSubTotal   = $this->cart->subtotal();
		$cartTotal      = $this->cart->total($shippingPrice);
		
		// Create order 
		$invoice_number = $this->order->makeNumber();
		
		$order = array(
			'subtotal'       => $cartSubTotal,
			'total'          => $cartTotal,
			'invoice_number' => $invoice_number,
			'coupon_id'      => $coupon,
			'user_id'        => $user['user_id'],
			'shipping_id'    => $shipping,
			'cart_id'        => $dbcart->id
		);
	
				
		$newOrder = $this->order->process($order);
		
		return $newOrder;
			
	}

	/**
	 *  User infos	
	 *
	 * @return array
	 */
	public function getUserInfo()
	{
		$transaction = array();
		
		// if user is logged in get id and infos
		if (Auth::check())
		{
			// prepare transactions infos		
		    $transaction['user_id'] = $this->user->getCurrentUserId();
		    $transaction['email']   = $this->user->getCurrentUserEmail();	     
		}
		else
		{
			// Else store new user infos address and create new id 
			$billing  = Session::get('billing');
			$shipping = Session::get('shipping');
			
			//Create new user

			$user = $this->user->create(array(
				'first_name' => $billing['first_name'],
				'last_name'  => $billing['last_name'],
				'email'      => $billing['email'],
			));

			// Billing
			$billing['type']    = 'billing';
			$billing['user_id'] = $user->id;
			// Shipping
			$shipping['type']    = 'shipping';
			$shipping['user_id'] = $user->id;			
						
			// create the two address
			$this->address->create($billing);
			$this->address->create($shipping);
			
			// prepare transactions infos
			$transaction['user_id'] = $user->id;	
		    $transaction['email']   = $billing['email']; // for transaction	
		}
		
		return $transaction;
	}

	/**
	 * Store cart
	 *
	 * @return Response
	 */
	public function storeCart($user)
	{	 
		// Store cart in db so we can still access it if the transaction doesn't go through					
		$cart = $this->cart->get()->toArray();	
		$cart = json_encode($cart);
		
		$data = array(
			'cart_content' => $cart,
			'user_id'      => $user['user_id'],
		);
		
		$dbcart = $this->cart->store($data);
			
		return $dbcart;			
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