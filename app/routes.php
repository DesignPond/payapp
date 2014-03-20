<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Cart::add('345', 'Other product 1', 1, 20.00, array('size' => 'bigger'));


Route::get('hello', function()
{
	return Cart::content();
});

View::share('cartTotalCount', Cart::count() );

Route::get('/', array( 'uses' => 'ShopController@index' ));


// Products
Route::resource('products', 'ProductController');


// Cart
Route::resource('cart', 'CartController');

// Offers
Route::resource('offers', 'OfferController');


// Subscription
Route::resource('subscriptions', 'SubscriptionController');


// Transactions
Route::post('paymill/transaction', 'PaymillController@transaction');
Route::post('paymill/transactionClient', 'PaymillController@transactionClient');
Route::resource('paymill', 'PaymillController');


// Clients
Route::get('clients/{client}/transaction', 'ClientController@transaction');
Route::resource('clients', 'ClientController');