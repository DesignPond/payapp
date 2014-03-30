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

Route::filter('cartNotEmpty', function()
{
    if ( Cart::count() == 0)
    {
        return Redirect::to('/');
    }
});

View::share('cartTotalCount',  Cart::count() );
View::share('cartTotalPrice',  Cart::total() );

Route::get('/', array( 'uses' => 'ShopController@index' ));

// Login
Route::resource('login', 'LoginController');

// Products
Route::resource('products', 'ProductController');

// Checkout
Route::get('checkout/billing', array( 'uses' => 'CheckoutController@billing' ));
Route::get('checkout/shipping', array( 'uses' => 'CheckoutController@shipping' ));
Route::get('checkout/copyBilling', array( 'uses' => 'CheckoutController@copyBilling' ));
Route::get('checkout/methodShipping', array( 'uses' => 'CheckoutController@methodShipping' ));
Route::get('checkout/methodPayment', array( 'uses' => 'CheckoutController@methodPayment' ));
Route::get('checkout/reviewOrder', array( 'uses' => 'CheckoutController@reviewOrder' ));

Route::post('checkout/reviewOrder', array( 'uses' => 'CheckoutController@reviewOrder' ));
Route::post('checkout/methodPayment', array( 'uses' => 'CheckoutController@methodPayment' ));
Route::post('checkout/methodShipping', array( 'uses' => 'CheckoutController@methodShipping' ));
Route::post('checkout/shipping', array( 'uses' => 'CheckoutController@shipping' ));
Route::resource('checkout', 'CheckoutController');

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