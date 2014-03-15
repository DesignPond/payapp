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
			$api_key      = Config::get('laravel-paymill::api_live');			 
			$this->apiKey = $api_key['key_private']; 
		}
		else 
		{
			$api_key       = Config::get('laravel-paymill::api_test');			
			$this->apiKey  = $api_key['key_private']; 
		}

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
	
	   try{	
	   	
			// request object
			$request = $this->authentication();
					
			// make new payement
			$payment = new Paymill\Models\Request\Payment();
			
			// set the token
			$payment->setToken($token);
			
			// set client with id
			if($client){
				$payment->setClient($client);
			}
			
			return $request->create($payment);	
						      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }
		
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
	
		try{
		    
			// request object
			$request = $this->authentication();
			
			// new payement object
			$payment = new Paymill\Models\Request\Payment();
			
			// set the token
			$payment->setToken($token);
			
			// set client with id
			if($client){
				$payment->setClient($client);
			}
			
			return $request->create($payment);		
		
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }	
	    
	}
	
	/**
	 * Returns data of a specific payment.
	 *
	 * @param  string, payment id
	 * @return array, data of payment 
	 */
	function getPayment($id)
	{
	
		try{
	    
			// request object
			$request = $this->authentication();
			
			// new payement object
			$payment = new Paymill\Models\Request\Payment();
			
			// set id
			$payment->setId($id);
			
			return  $request->getOne($payment);				
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

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
	
		try{
		
			// request object
			$request = $this->authentication();
			
			// set params
		    $params = array(
	           'count'         =>  $count,
	           'offset'        =>  $offset,
	           'created_at'    =>  $created_at
	        );
			
			// new payement object
			$payment = new Paymill\Models\Request\Payment();
					
			// set filters
			$payment->setFilter($params);
			
			// get list of all payements
			return  $request->getAll($payment);				
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

	}
	
	/**
	 * Deletes the specified payment.
	 *
	 * @param  string, payment id
	 * @return array, empty 
	 */
	function removePayment($id)
	{
	
		try{	
			
			// request object
			$request = $this->authentication();
			
			// new payement object
			$payment = new Paymill\Models\Request\Payment();
			
			// set id
			$payment->setId($id);
			
			// remove payement
			return  $request->delete($payment);		
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

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
	
		try{
	    		
			// request object
			$request = $this->authentication();
			
			// new transaction object
			$transaction = new Paymill\Models\Request\Transaction();
			
			// set the params for transaction
			$transaction->setAmount($amount) // e.g. "4200" for 42.00 EUR
			            ->setCurrency($currency)
			            ->setPayment($token);
			
			// if description
			if($description){
				$transaction->setDescription($description);
			} 
			
			// create transaction from token
			return $request->create($transaction);					
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }	
	
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

	function newTransactionPayment($amount, $currency, $payment, $description = NULL, $client = NULL)
	{
		try{
		
			// request object
			$request = $this->authentication();
			
			// new transaction object
			$transaction = new Paymill\Models\Request\Transaction();
			
			// set params
			$transaction->setAmount($amount) 
			            ->setCurrency($currency)
			            ->setPayment($payment);
			
			// if description
			if($description){
				$transaction->setDescription($description);
			} 
			 
			// if client           
			if($client){
				$transaction->setClient($client);
			}          
			
			$response = $request->create($transaction);
		
		}
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

	}

	/**
	 * Create a transaction from preauthorization.
	 * You have to create at least either a preauthorization object
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

	function newTransactionPreauthorization($amount, $currency, $preauthorization , $description = NULL, $client = NULL  )
	{
		try{
		
			// request object
			$request = $this->authentication();
			
			// new transaction object
			$transaction = new Paymill\Models\Request\Transaction();
			
			// set params
			$transaction->setAmount($amount) 
			            ->setCurrency($currency)
			            ->setPreauthorization($preauthorization);
			
			// if description
			if($description){
				$transaction->setDescription($description);
			} 
			 
			// if client           
			if($client){
				$transaction->setClient($client);
			}           
			
			// return new transaction
			$response = $request->create($transaction);
		
		}
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

	}
	
	/**
	 * Get a transaction object with the information of the used payment,
	 * client and transaction attributes.
	 *
	 * @param  string, id
	 * @return array, transaction data 
	 */
	function getTransaction($id)
	{
	
		try{
	    
			// request object
			$request = $this->authentication();
			
			// new transaction object
			$transaction = new Paymill\Models\Request\Transaction();
			
			// set the id of transaction
			$transaction->setId($id);
			
			return  $request->getOne($transaction);				
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

	}
	
	/**
     * Get transaction list
     * 
     * @param   int, count *optional
     * @param   int, offset *optional
     * @param   ¿?, created_at *optional
     * @return  array, transaction list
     */
	function getListTransaction($client = NULL ,$count = NULL, $offset = NULL, $created_at = NULL)
	{	
	
		try{
	    
			// request object
			$request = $this->authentication();
			
			// set parames
		    $params = array(
	           'count'      =>  $count,
	           'offset'     =>  $offset,
	           'created_at' =>  $created_at,
	           'client'     =>  $client
	        );
	        
	        // new transaction object
		    $transaction = new Paymill\Models\Request\Transaction();
		    
		    // set filters
		    $transaction->setFilter($params);
			
			// return all transactions
			return $request->getAll($transaction);		
			      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

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
	
		try{
	    
			// request object
			$request = $this->authentication();
			
			// new refund object
			$refund = new Paymill\Models\Request\Refund();
			
			// set params
			$refund->setId($transactionId)
			       ->setAmount($amount) // e.g. "4200" for 42.00 EUR
			       ->setDescription($description);
			
			// return new refund created
			return  $request->create($refund);		
			      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

	}
	
	/**
	 * Returns detailed informations of a specific refund.
	 *
	 * @param  string, refund id
	 * @return array, refund data 
	 */
	function getRefund($id)
	{
	
		try{
		   
			// request object
			$request = $this->authentication();
			
			// new refund object
			$refund = new Paymill\Models\Request\Refund();
			
			// set id
			$refund->setId($id);
			
			// return refund
			return  $request->getOne($refund);		
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

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
	
		try{
        
			// request object
			$request = $this->authentication();		
			
			// params	    		    
		    $params = array(
	           'count'          =>  $count,
	           'offset'         =>  $offset,
	           'transaction'    =>  $transaction,
	           'client'         =>  $client,
	           'amount'         =>  $amount,
	           'created_at'     =>  $created_at
	        );
	
			// new list of refund with params        
			$refund = new Paymill\Models\Request\Refund();
			
			// set filters
			$refund->setFilter($params);
			
			// return all refunds
			return  $request->getAll($refund);
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

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
	
		try{
		    
			// request object
			$request = $this->authentication();
			
			// new client object
			$client  = new Paymill\Models\Request\Client();
			
			// if email
			if($email){
				$client->setEmail($email);
			}
			
			// if description
			if($description){
				$client->setDescription($description);
			}
			
			return  $request->create($client);		
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

	}
	
	/**
	 * Get a client object.
	 *
	 * @param  string, client id
	 * @return array, client data 
	 */
	function getClient($id)
	{
	
		try{
	    
			// request object
			$request = $this->authentication();
			
			// get client object
			$client = new Paymill\Models\Request\Client();
			
			// fetch client by id
			$client->setId($id);
			
			return $request->getOne($client);			
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

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
	
		try{
	    
			// request object
			$request = $this->authentication();
			
			// new client object
			$client = new Paymill\Models\Request\Client();
			
			// set params
			$client->setId($id);
			
			if($email){
				$client->setEmail($email);
			}
			
			if($description){
				$client->setDescription($description);
			}			       
			
			return $request->update($client);		
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

	}
	
	/**
	 * Deletes a client, but your transactions aren’t deleted.
	 * 
	 * @param  string, client id
	 * @return array, client data
	 */
	function removeClient($id)
	{
	
		try{
	    
			// request object
			$request = $this->authentication();
			
			// new client object
			$client = new Paymill\Models\Request\Client();
			
			// set id
			$client->setId($id);
			
			return $request->delete($client);		
			      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

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
	
		try{
		
		    // request object
			$request = $this->authentication();		
			
			// params	    
		    $params = array(
		       'count'         =>  $count,
		       'offset'        =>  $offset,
		       'creditcard'    =>  $creditcard,
		       'email'         =>  $email,
		       'created_at'    =>  $created_at
	        );
			
			// new client object
			$client  = new Paymill\Models\Request\Client();
			
			// set filters
			$client->setFilter($params);
			
			// return all clients
			return $request->getAll($client);
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

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
	function newOffer($amount, $currency, $interval, $name, $trial_period_days = NULL)
	{
	
		try{
	    
			// request object
			$request = $this->authentication();
			
			// new offer object
			$offer = new Paymill\Models\Request\Offer();
			
			// set params
			$offer->setAmount($amount)
			      ->setCurrency($currency)
			      ->setInterval($interval)
			      ->setName($name);
			      
			if($trial_period_days)
			{
				$offer->setTrialPeriodDays($trial_period_days);
			}
			
			return $request->create($offer);				
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

	}
	
	/**
	 * Getting detailed information about an offer requested with the offer ID.
	 * 
	 * @param  string, offer id
	 * @return array, offer data
	 */
	function getOffer($id)
	{	
	
		try{
	    	
			// request object
			$request = $this->authentication();

			// new offer object				
			$offer = new Paymill\Models\Request\Offer();
			
			// set id
			$offer->setId($id);
			
			return $request->getOne($offer);		
			      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }
		
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
		
		try{
				    
			// request object
			$request = $this->authentication();
			
	        // new offer object
			$offer = new Paymill\Models\Request\Offer();
			
			// update name
			$offer->setId($id)
			      ->setName($name);
			
			return  $request->update($offer);	
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

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
	
		try{		
		    
			// request object
			$request = $this->authentication();
			
			// new offer object
			$offer = new Paymill\Models\Request\Offer();
			
			// get by id
			$offer->setId($id);
			
			return  $request->delete($offer);
		      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

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
	
		try{
		
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
	        
	        // new offer object by params
		    $offer = new Paymill\Models\Request\Offer();
		    
			// set filters
			$offer->setFilter($params);
	
			return $request->getAll($offer);		
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }
	    
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
	
		try{
		
			// request object
			$request = $this->authentication();
			
			// new preauthorization object
			$preAuth = new Paymill\Models\Request\Preauthorization();
			
			// set params
			$preAuth->setToken($token)
			        ->setAmount($amount)
			        ->setCurrency($currency);
			
			return  $request->create($preAuth);		
			      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }
	    
	}
	
	/**
	 * Getting detailed information about an offer requested with the offer ID.
	 * 
	 * @param  string, offer id
	 * @return array, offer data
	 */
	function getPreauthorization($id)
	{
	
		try{
		
			// request object
			$request = $this->authentication();
			
			// new preauthorization object
			$preAuth = new Paymill\Models\Request\Preauthorization();
			
			// get by id
			$preAuth->setId($id);
			
			return  $request->getOne($preAuth);			
			      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }
	    		
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
	
		try{
		
			// request object
			$request = $this->authentication();
			
			// new preauthorization object
			$preAuth = new Paymill\Models\Request\Preauthorization();
			
			// get by id
			$preAuth->setId($id);
	
			return  $request->delete($preAuth);		
			      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }
	    
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
	
		try{
		
			// request object
			$request = $this->authentication();
			
			// params		
		    $params = array(
	           'count'              =>  $count,
	           'offset'             =>  $offset,
	           'created_at'         =>  $created_at
	        );
	        
	        // new preauthorization object
			$preAuth = new Paymill\Models\Request\Preauthorization();
			
			// set filters
			$preAuth->setFilter($params);
	
			return  $request->getAll($preAuth);		
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }
	    
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
	
		try{
		
			// request object
			$request = $this->authentication();
			
			// new subscription object
			$subscription = new Paymill\Models\Request\Subscription();
			
			// set params
			$subscription->setClient($client)
			             ->setOffer($offer)
			             ->setPayment($payment);
			
			return $request->create($subscription);
			      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }
	    
	}
	
	/**
	 * Returns the detailed information of the concrete requested subscription.
	 * 
	 * @param  string, subscription id
	 * @return array, subscription data
	 */
	function getSubscription($id)
	{
	
		try{
		
			// request object
			$request = $this->authentication();
			
			// new subscription object
			$subscription = new Paymill\Models\Request\Subscription();
			
			// get by id
			$subscription->setId($id);
			
			return $request->getOne($subscription);	
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

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
	
		try{
		
			// request object
			$request = $this->authentication();
	        
	        // new subscription object
			$subscription = new Paymill\Models\Request\Subscription();
			
			// set params
			$subscription->setId($id)
			             ->setOffer($offer)
			             ->setPayment($payement)
			             ->setCancelAtPeriodEnd($cancelAtPeriodEnd);
			
			return $request->update($subscription);	
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }

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
	
		try{
		
			// request object
			$request = $this->authentication();
			
			// new subscription object
			$subscription = new Paymill\Models\Request\Subscription();
			
			// get by id
			$subscription->setId($id);
	
			return $request->delete($subscription);
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }
	    
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
	
		try{
        
			// request object
			$request = $this->authentication();	
				
		    $params = array(
	           'count'       =>  $count,
	           'offset'      =>  $offset,
	           'offer'       =>  $offer,
	           'created_at'  =>  $created_at,
	           'canceled_at' =>  $canceled_at,
	        );
			
			// new subscription object
			$subscription = new Paymill\Models\Request\Subscription();
			
			// set filters
			$subscription->setFilter($params);
			
			return  $request->getAll($subscription);
	      
	    }
	    catch(PaymillException $e){
	        //Do something with the error informations below
	        $e->getResponseCode();
	        $e->getStatusCode();
	        $e->getErrorMessage();
	    }
	    

	}

 
}