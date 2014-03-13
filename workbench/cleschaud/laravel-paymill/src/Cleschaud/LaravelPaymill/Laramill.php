<?php namespace Cleschaud\LaravelPaymill;

use Config;
use Paymill;
 
class Laramill{

	private  $apiKey;

	function __construct()
	{
		// Test or live mode
		$test_mode = Config::get('laravel-paymill::test_mode'); 
	
		// if it's not in test mode
		if ( !$test_mode )
		{
			$api_key = Config::get('laravel-paymill::api_live');
			 
			$this->apiKey      = $api_key['key_private']; 
		}
		else 
		{
			$api_key = Config::get('laravel-paymill::api_test');
			
			$this->apiKey  = $api_key['key_private']; 
		}

	}
 
	public function request_api(){
		
		// Request to the paymill API	
		$request = new Paymill\Request($this->apiKey);
		
		// id for test
		$id  = 'client_aac766c78002f4d315a0';
		$pay = 'pay_dba1845355d9f7a2958e89f6';	
		
		/*=============================
			Create a client	
		==============================*/
		/*
		$client  = new Paymill\Models\Request\Client();	
		$client->setEmail('cindy.leschaud@gmail.com')
			   ->setDescription('This is a new client');
		$response = $request->create($client);
		*/
		
		/*=============================
			Retrive a client by ID	
		==============================*/
		
		/*
		$client = new Paymill\Models\Request\Client();
		$client->setId($id);	
		$response = $request->getOne($client);
		*/
		
		/*=============================
			Update a client 	
		==============================*/
		
		/*
		$client = new Paymill\Models\Request\Client();
		$client->setId($id)
		       ->setEmail('pruntrut@yahoo.fr')
		       ->setDescription('Updated Client');	
		$response = $request->update($client);
		*/
		
		/*=============================
			Get list of clients	
		==============================*/
			
		/*
		$client   = new Paymill\Models\Request\Client();
		$response = $request->getAll($client);
		*/
				
		/*=============================
			Create new creditcard
		==============================*/		
		
		/*
		$payment = new Paymill\Models\Request\Payment();
		$payment->setToken('098f6bcd4621d373cade4e832627b4f6')
		        ->setClient($id);
		
		$response = $request->create($payment);
		*/
				
		/*=============================
			Create transaction
		==============================*/		

		/*
		$transaction = new Paymill\Models\Request\Transaction();
		$transaction->setAmount(4200) // e.g. "4200" for 42.00 EUR
		            ->setCurrency('EUR')
		            ->setPayment($pay)
		            ->setDescription('Test Transaction');
		
		$response = $request->create($transaction);		
		*/
		
		// return $response;
	
	}

	/**
	 * Create paymill request object with authentification
	 *
	 * @return object 
	 */	
	function authentication(){
		
		return new Paymill\Request($this->apiKey);
		
	}
	
	/**
	 * Creates a credit card payment from a given token,
	 * if you’re providing the client-property, the payment
	 * will be created and subsequently be added to the client.
	 *
	 * @param  string, token
	 * @param  string, client *optional
	 * @return array, data credit card payment 
	 */
	function newCreditCardPayement($token, $client = NULL)
	{
		
		// request object
		$request = $this->authentication();
	
		// make new payement
		$payment = new Paymill\Models\Request\Payment();
		
		$payment->setToken($token);
		
		if($client){
			$payment->setClient($client);
		}
		
		$response = $request->create($payment);
		
		return $response;
		
	}
	
	/**
	 * Creates a direct debit payment from the given account data,
	 * if you’re providing the client-property, the payment will 
	 * be created and subsequently be added to the client.
	 *
	 * @param  string, type
	 * @param  string, code
	 * @param  string, account
	 * @param  string, holder
	 * @param  string, client *optional
	 * @return array, data debit card payment 
	 */
	function newDebitCardPayement($token, $client = NULL)
	{		
		// request object
		$request = $this->authentication();
		
		$payment = new Paymill\Models\Request\Payment();
		
		$payment->setToken($token);
		
		if($client){
			$payment->setClient($client);
		}
		
		return $request->create($payment);
	}
	
	/**
	 * Returns data of a specific payment.
	 *
	 * @param  string, payment id
	 * @return array, data of payment 
	 */
	function getPayment($id)
	{
		// request object
		$request = $this->authentication();
		
		$payment = new Paymill\Models\Request\Payment();
		
		$payment->setId($id);
		
		return  $request->getOne($payment);

	}
	
	/**
     * Get payment list
     * 
     * @param   int, count *optional
     * @param   int, offset *optional
     * @param   ¿?, created_at *optional
     * @return  array, list payments
     */
	function getListPayment($count = NULL, $offset = NULL, $created_at = NULL)
	{
	    $params = array(
           'count'         =>  $count,
           'offset'        =>  $offset,
           'created_at'    =>  $created_at
        );
        
		// request object
		$request = $this->authentication();
		
		$payment = new Paymill\Models\Request\Payment($params);
		
		return  $request->getAll($payment);
	}
	
	/**
	 * Deletes the specified payment.
	 *
	 * @param  string, payment id
	 * @return array, empty 
	 */
	function removePayment($id)
	{
		// request object
		$request = $this->authentication();
		
		$payment = new Paymill\Models\Request\Payment();
		$payment->setId($id);
		
		return  $request->delete($payment);
	}
	
	/**
	 * Create a transaction from token.
	 * You have to create at least either a token object
	 * before you can execute a transaction. You get back a response
	 * object indicating whether a transaction was successful or not.
	 *
	 * @param  integer, amount
	 * @param  string, currency
	 * @param  string, token
	 * @param  string, description *optional
	 * @return array, transaction data 
	 */
	function newTransactionToken($amount, $currency, $token, $description = NULL)
	{		
		// request object
		$request = $this->authentication();
		
		// new transaction object
		$transaction = new Paymill\Models\Request\Transaction();
		
		// set the params for transation
		$transaction->setAmount($amount) // e.g. "4200" for 42.00 EUR
		            ->setCurrency($currency)
		            ->setPayment($token)
		            ->setDescription($description);
		
		return $request->create($transaction);		
	
	}
	
	/**
	 * Create a transaction from payment.
	 * You have to create at least either a payment object
	 * before you can execute a transaction. You get back a response
	 * object indicating whether a transaction was successful or not.
	 *
	 * @param  integer, amount
	 * @param  string, currency
	 * @param  string, payment
	 * @param  string, description *optional
	 * @param  string, client *optional
	 * @return array, transaction data 
	 */
/*
	function newTransactionPayment($amount, $currency, $payment, $description = NULL, $client = NULL)
	{
		$params = array(
		    'amount'      =>  $amount,
		    'currency'    =>  $currency,
		    'payment'     =>  $payment,
		    'description' =>  $description,
		    'client'      =>  $client
		);
		
		// request object
		$request = $this->authentication();
	}
*/
	
	/**
	 * Get a transaction object with the information of the used payment,
	 * client and transaction attributes.
	 *
	 * @param  string, id
	 * @return array, transaction data 
	 */
	function getTransaction($id)
	{
		// request object
		$request = $this->authentication();
		
		$transaction = new Paymill\Models\Request\Transaction();
		$transaction->setId($id);
		
		return  $request->getOne($transaction);
	}
	
	/**
     * Get transaction list
     * 
     * @param   int, count *optional
     * @param   int, offset *optional
     * @param   ¿?, created_at *optional
     * @return  array, transaction list
     */
	function getListTransaction($client ,$count = NULL, $offset = NULL, $created_at = NULL)
	{	
		// request object
		$request = $this->authentication();
		
	    $params = array(
           'count'         =>  $count,
           'offset'        =>  $offset,
           'created_at'    =>  $created_at,
           'byClientId'    =>  $client
        );
        
	    $transaction = new Paymill\Models\Request\Transaction($params);

		return $request->getAll($transaction);

	}
	
	/**
	 * Refunds a transaction that has been created previously and
	 * was refunded in parts or wasn’t refunded at all. The inserted
	 * amount will be refunded to the credit card / direct debit of
	 * the original transaction. 
	 * There will be some fees for the merchant for every refund.
	 *
	 * @param  string, transaction id
	 * @param  integer, amount
	 * @param  string, description *optional
	 * @return array, refund transaction data 
	 */
	function refundTransaction($transactionId, $amount, $description = NULL)
	{
		// request object
		$request = $this->authentication();
		
		$refund = new Paymill\Models\Request\Refund();
		$refund->setId($transactionId)
		       ->setAmount($amount) // e.g. "4200" for 42.00 EUR
		       ->setDescription($description);
		
		return  $request->create($refund);
	}
	
	/**
	 * Returns detailed informations of a specific refund.
	 *
	 * @param  string, refund id
	 * @return array, refund data 
	 */
	function getRefund($id)
	{
		// request object
		$request = $this->authentication();
		
		$refund = new Paymill\Models\Request\Refund();
		$refund->setId($id);
		
		return  $request->getOne($refund);
	}
	
	/**
     * Get refund list
     * 
     * @param   int, count *optional
     * @param   int, offset *optional
     * @param   string, transaction *optional
     * @param   string, client *optional
     * @param   int, amount *optional
     * @param   ¿?, created_at *optional
     * @return  array, transaction list
     */
	function getListRefund($count = NULL, $offset = NULL, $transaction = NULL, $client = NULL, $amount = NULL, $created_at = NULL)
	{
	    $params = array(
           'count'          =>  $count,
           'offset'         =>  $offset,
           'transaction'    =>  $transaction,
           'client'         =>  $client,
           'amount'         =>  $amount,
           'created_at'     =>  $created_at
        );
        
		// request object
		$request = $this->authentication();
		        
		$refund = new Paymill\Models\Request\Refund($params);
		
		return  $request->getAll($refund);
	}
	
	/**
	 * Creates a client object.
	 *
	 * @param  string, email *optional
	 * @param  string, description *optional
	 * @return array, client data 
	 */
	function newClient($email = NULL, $description = NULL)
	{
		// request object
		$request = $this->authentication();
		
		$client = new Paymill\Models\Request\Client();
		$client->setEmail($email)
		       ->setDescription($description)
		
		return  $request->create($client);
	}
	
	/**
	 * Get a client object.
	 *
	 * @param  string, client id
	 * @return array, client data 
	 */
	function getClient($id)
	{
		// request object
		$request = $this->authentication();
		
		// get client object
		$client = new Paymill\Models\Request\Client();
		
		// fetch client by id
		$client->setId($id);
		
		$response = $request->getOne($client);	
		
		return $response;
	}
	
	/**
	 * Updates the data of a client. 
	 * To change only a specific attribute you can set this attribute
	 * in the update request.
	 * All other attributes that shouldn’t be edited aren’t inserted.
	 *
	 * @param  string, client id
	 * @param  string, email *optional
	 * @param  string, description *optional
	 * @return array, client data 
	 */
	function updateClient($id, $email = NULL, $description = NULL)
	{
		// request object
		$request = $this->authentication();
		
		$client = new Paymill\Models\Request\Client();
		$client->setId($id)
		       ->setEmail($email)
		       ->setDescription($description);
		
		return $request->update($client);
	}
	
	/**
	 * Deletes a client, but your transactions aren’t deleted.
	 * 
	 * @param  string, client id
	 * @return array, client data
	 */
	function removeClient($id)
	{
		// request object
		$request = $this->authentication();
		
		$client = new Paymill\Models\Request\Client();
		$client->setId($id);
		
		return $request->delete($client);

	}
	
	/**
     * Get client list
     * 
     * @param   int, count *optional
     * @param   int, offset *optional
     * @param   string, creditcard *optional
     * @param   string , email *optional
     * @param   ¿?, created_at *optional
     * @return   array, list clients
     */
	function getListClient($count = NULL, $offset = NULL, $creditcard = NULL, $email = NULL, $created_at = NULL)
	{
	    $params = array(
	       'count'         =>  $count,
	       'offset'        =>  $offset,
	       'creditcard'    =>  $creditcard,
	       'email'         =>  $email,
	       'created_at'    =>  $created_at
        );
        
	    // request object
		$request = $this->authentication();
        
		$client  = new Paymill\Models\Request\Client($params);

		return $request->getAll($client);
	}
	
	/**
	 * Create an offer.
	 * 
	 * @param  integer, amount
	 * @param  string, current
	 * @param  enum (week, month, year), interval
	 * @param  string, name
	 * @return array, offer data
	 */
	function newOffer($amount, $currency, $interval, $name)
	{
		// request object
		$request = $this->authentication();

		$offer = new Paymill\Models\Request\Offer();
		
		$offer->setAmount($amount)
		      ->setCurrency($currency)
		      ->setInterval($interval)
		      ->setName($name);
		
		return $request->create($offer);

	}
	
	/**
	 * Getting detailed information about an offer requested with the offer ID.
	 * 
	 * @param  string, offer id
	 * @return array, offer data
	 */
	function getOffer($id)
	{		
		// request object
		$request = $this->authentication();
			
		$offer = new Paymill\Models\Request\Offer();
		$offer->setId($id);
		
		return $request->getOne($offer);		
	}
	
	/**
	 * Updates the offer. Only the name can be changed all other attributes cannot be edited
	 * 
	 * @param  string, offer id
	 * @param  string, name
	 * @return array, offer data
	 */
	function updateOffer($id, $name)
	{
		// request object
		$request = $this->authentication();
        
		$offer = new Paymill\Models\Request\Offer();
		$offer->setId($id)
		      ->setName($name);
		
		return  $request->update($offer);
	}
	
	/**
	 * Remove offer.
	 * You only can delete an offer if no client is subscribed to this offer.
	 * 
	 * @param  string, offer id
	 * @return array, empty
	 */
	function removeOffer($id)
	{
		// request object
		$request = $this->authentication();
		
		$offer = new Paymill\Models\Request\Offer();
		$offer->setId($id);
		
		return  $request->delete($offer);
	}
	
	/**
     * Get offer list
     * 
     * @param   int, count *optional
     * @param   int, offset *optional
     * @param   string, interval *optional
     * @param   int, amount *optional
     * @param   ¿?, created_at *optional
     * @param   ¿?, trial_period_days *optional
     * @return  array, offer list
     */
	function getListOffer($count = NULL, $offset = NULL, $interval = NULL, $amount = NULL, $created_at = NULL, $trial_period_days = NULL)
	{
		// request object
		$request = $this->authentication();
				
	    $params = array(
           'count'              =>  $count,
           'offset'             =>  $offset,
           'interval'           =>  $interval,
           'amount'             =>  $amount,
           'created_at'         =>  $created_at,
           'trial_period_days'  =>  $trial_period_days
        );
        
	    $offer = new Paymill\Models\Request\Offer($params);

		return $request->getAll($offer);
	}
	
	
	/**
	 * Create an offer.
	 * 
	 * @param  integer, amount
	 * @param  string, current
	 * @param  enum (week, month, year), interval
	 * @param  string, name
	 * @return array, offer data
	 */
	function newPreauthorization($amount, $currency, $token)
	{
		// request object
		$request = $this->authentication();

		$preAuth = new Paymill\Models\Request\Preauthorization();
		$preAuth->setToken($token)
		        ->setAmount($amount)
		        ->setCurrency($currency);
		
		return  $request->create($preAuth);

	}
	
	/**
	 * Getting detailed information about an offer requested with the offer ID.
	 * 
	 * @param  string, offer id
	 * @return array, offer data
	 */
	function getPreauthorization($id)
	{		
		// request object
		$request = $this->authentication();
		
		$preAuth = new Paymill\Models\Request\Preauthorization();
		$preAuth->setId($id);
		
		return  $request->getOne($preAuth);	
	}
	
	/**
	 * Remove offer.
	 * You only can delete an offer if no client is subscribed to this offer.
	 * 
	 * @param  string, offer id
	 * @return array, empty
	 */
	function removePreauthorization($id)
	{
		// request object
		$request = $this->authentication();
		
		$preAuth = new Paymill\Models\Request\Preauthorization();
		$preAuth->setId($id);

		return  $request->delete($preAuth);
	}
	
	/**
     * Get offer list
     * 
     * @param   int, count *optional
     * @param   int, offset *optional
     * @param   string, interval *optional
     * @param   int, amount *optional
     * @param   ¿?, created_at *optional
     * @param   ¿?, trial_period_days *optional
     * @return  array, offer list
     */
	function getListPreauthorization($count = NULL, $offset = NULL, $created_at = NULL)
	{
		// request object
		$request = $this->authentication();
				
	    $params = array(
           'count'              =>  $count,
           'offset'             =>  $offset,
           'created_at'         =>  $created_at
        );
        
		$preAuth = new Paymill\Models\Request\Preauthorization($params);

		return  $request->getAll($preAuth);
	}
	
	/**
	 * Creates a subscription between a client and an offer. 
	 * A client can have several subscriptions to different offers,
	 * but only one subscription to the same offer. The clients is
	 * charged for each billing interval entered.
	 * 
	 * @param  string, client
	 * @param  string, offer
	 * @param  string, payment
	 * @return array, subscription data
	 */
	function newSubscription($client, $offer, $payment) //payment??
	{
		// request object
		$request = $this->authentication();
		
		$subscription = new Paymill\Models\Request\Subscription();
		
		$subscription->setClient($client)
		             ->setOffer($offer)
		             ->setPayment($payment);
		
		return $request->create($subscription);
		
	}
	
	/**
	 * Returns the detailed information of the concrete requested subscription.
	 * 
	 * @param  string, subscription id
	 * @return array, subscription data
	 */
	function getSubscription($id)
	{
		// request object
		$request = $this->authentication();
		
		$subscription = new Paymill\Models\Request\Subscription();
		$subscription->setId($id);
		
		return $request->getOne($subscription);

	}
	
	/**
	 * Updates the subscription of a client.
	 * 
	 * @param  string, subscription id
	 * @param  boolean, Cancel this subscription immediately or at the end of the current period
	 * @return array, subscription data
	 */
	function updateSubscription( $id , $offer , $payement , $cancelAtPeriodEnd = false)
	{
		// request object
		$request = $this->authentication();
        
		$subscription = new Paymill\Models\Request\Subscription();
		$subscription->setId($id)
		             ->setOffer($offer)
		             ->setPayment($payement)
		             ->setCancelAtPeriodEnd($cancelAtPeriodEnd);
		
		return $request->update($subscription);

	}
	
	/**
	 * Removes an existing subscription. If you set the attribute
	 * cancel_at_period_end parameter to the value true, the subscription
	 * will remain active until the end of the period. The subscription
	 * will not be renewed again. If the value is set to false it is directly
	 * terminated but pending transactions will still be charged.
	 * 
	 * @param  string, subscription id
	 * @return array, subscription data
	 */
	function removeSubscription($id)
	{
		// request object
		$request = $this->authentication();
		
		$subscription = new Paymill\Models\Request\Subscription();
		$subscription->setId($id);

		return $request->delete($subscription);
	}
	
	/**
     * Get subscription list
     * 
     * @param   int, count *optional
     * @param   int, offset *optional
     * @param   string, offer *optional
     * @param   ¿?, canceled_at *optional
     * @param   ¿?, created_at *optional
     * @return  array, subscription list
     */
	function getListSubscription($count = NULL, $offset = NULL, $offer = NULL,  $canceled_at = NULL, $created_at = NULL)
	{
	    $params = array(
           'count'       =>  $count,
           'offset'      =>  $offset,
           'offer'       =>  $offer,
           'created_at'  =>  $created_at,
           'canceled_at' =>  $canceled_at,
        );
        
		// request object
		$request = $this->authentication();
		
		$subscription = new Paymill\Models\Request\Subscription($params);
		
		$response = $request->getAll($subscription);

	}

 
}