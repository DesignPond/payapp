<?php

use Shop\Repo\Cart\CartInterface;

use Shop\Repo\Order\OrderInterface;

use Shop\Repo\User\UserInterface;

use Shop\Repo\Address\AddressInterface;

class OrderController extends \BaseController {

	protected $cart;

	protected $order;
	
	protected $user;
	
	public function __construct( CartInterface $cart , OrderInterface $order , UserInterface $user , AddressInterface $address ){
		
		$this->cart    = $cart;
		
		$this->order   = $order;
		
		$this->user    = $user;
		
		$this->address = $address;
		
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
		echo 'store order';
		
		$transaction = array();
		
		// if user is logged in get id and infos
		if (Auth::check())
		{
		    $transaction['user_id'] = Auth::user()->id;	
		    $transaction['email']   = Auth::user()->email; // for transaction		     
		}
		else
		{
			// Else store new user infos address and create new id 
			$billing  = Session::get('billing');
			$shipping = Session::get('shipping');
			
			$new = array(
				'first_name' => $billing['first_name'],
				'last_name'  => $billing['last_name'],
				'email'      => $billing['email'],
			);
			
			$user = $this->user->create($new);

			// Billing
			$billing['type']    = 'billing';
			$billing['user_id'] = $user->id;
			// Shipping
			$shipping['type']    = 'shipping';
			$shipping['user_id'] = $user->id;			
			
			$this->user->address($billing);
			$this->user->address($shipping);
			
			$transaction['user_id'] = $user->id;	
		    $transaction['email']   = $billing['email']; // for transaction	
		}
		
		// Store cart in db so we can still access it if the transaction doesn't go through					

		$cart = $this->cart->get()->toArray();	
		$cart = json_encode($cart);
		
		$data = array(
			'cart_content' => $cart,
			'user_id'      => $transaction['user_id'],
		);
		
		$this->cart->store($data);
			
		echo '<pre>';
		print_r($transaction);
		echo '</pre>';
		
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