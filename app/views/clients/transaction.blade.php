@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">

					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- Page Title -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<h1>Add a transaction from credit card</h1>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- END Title -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					
					@if(Session::has('status'))
					<div class="alert alert-dismissable alert-{{  Session::get('status') }}">
						@if(Session::has('message'))
							{{  Session::get('message') }}
						@endif
					</div>
					@endif
					
					<?php if(!empty($client)) {  ?>	
					
					<p class="payment-errors alert red"></p>	
								
					<form id="payment-form" class="column-one-third" action="<?php echo url('paymill/transaction'); ?>" method="POST">
													
						  <input class="clientToken" name="clientToken" type="hidden" value="<?php echo $client->getid(); ?>" />						  
						  <input class="card-currency" name="card-currency" type="hidden" value="CHF" />
						  <input class="card-amount-int" name="card-amount-int" type="hidden" value="5000" />
						  					
						  <div class="form-group">
						  	<label>Card number</label>
						    <input class="card-number" type="text" size="20" />
						  </div>
						
						  <div class="form-group">
						  	<label>CVC</label>
						    <input class="card-cvc" type="text" size="4" />
						  </div>
						
						  <div class="form-group">
						  	<label>Name</label>
						    <input class="card-holdername" type="text" size="4" />
						  </div>
						
						  <div class="form-group ">
						  	<label>Expiry date (MM/YYYY)</label>
						    <input class="card-expiry-month small" placeholder="MM" type="text" size="2" />
						    <input class="card-expiry-year small" placeholder="YYYY" type="text" size="4" />
						    <p class="clear"></p>
						  </div>
											
						  <p><input type="submit" class="accent" Value="Submit "/></p>
						  					
					</form>
					
					<?php } ?>

		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop