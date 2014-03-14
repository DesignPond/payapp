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

/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

/*
Route::get('/', function(){

	echo '<pre>';
	  print_r( Laramill::request_api() );
	echo '</pre>';
  
});
*/


Route::get('/', array( 'uses' => 'HomeController@index' ));

// transactions
Route::post('paymill/transaction', 'PaymillController@transaction');

// Offers
Route::post('paymill/newOffer', 'PaymillController@newOffer');
Route::post('paymill/updateOffer', 'PaymillController@updateOffer');
Route::get('paymill/offer', 'PaymillController@offer');
Route::get('paymill/offer/{offer}', 'PaymillController@offer');
Route::get('paymill/deleteOffer/{offer}', 'PaymillController@deleteOffer');

Route::resource('paymill', 'PaymillController');


// clients
Route::get('clients/{client}/transaction', 'ClientController@transaction');
Route::resource('clients', 'ClientController');