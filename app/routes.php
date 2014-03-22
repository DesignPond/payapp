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

//Cart::add('234', 'Other product 4534', 1, 120.00, array('size' => 'M'));


Route::get('hello', function()
{
	return Cart::content();
});


View::share('cartTotalCount',  Cart::count() );
View::share('cartTotalPrice',  Cart::total() );

Route::get('/', array( 'uses' => 'ShopController@index' ));


// Products
Route::resource('products', 'ProductController');


// Cart
Route::get('cart/checkout',array( 'uses' => 'CartController@checkout' ));
Route::post('cart/addToCart',  array( 'uses' => 'CartController@addToCart' ));
Route::post('cart/applyCouponCode',  array( 'uses' => 'CartController@applyCouponCode' ));
Route::get('cart/update',  array( 'uses' => 'CartController@update' ));
Route::get('cart/delete/{row}', array( 'uses' => 'CartController@delete' ));
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