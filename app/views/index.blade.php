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
					<h1>Form</h1>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- END Title -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- Contact Form -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					
					<p class="payment-errors alert red"></p>
						
					<form id="payment-form" class="column-one-third" method="POST">
	
						  <input class="card-amount-int" type="hidden" value="15" />
						  <input class="card-currency" type="hidden" value="EUR" />
						
						  <div class="form-row">
						  	<label>Card number</label>
						    <input class="card-number" type="text" size="20" />
						  </div>
						
						  <div class="form-row">
						  	<label>CVC</label>
						    <input class="card-cvc" type="text" size="4" />
						  </div>
						
						  <div class="form-row">
						  	<label>Name</label>
						    <input class="card-holdername" type="text" size="4" />
						  </div>
						
						  <div class="form-row ">
						  	<label>Expiry date (MM/YYYY)</label>
						    <input class="card-expiry-month small" placeholder="MM" type="text" size="2" />
						    <input class="card-expiry-year small" placeholder="YYYY" type="text" size="4" />
						    <p class="clear"></p>
						  </div>
											
						  <p><input type="submit" class="accent" Value="Submit "/></p>
						  					
					</form>

					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- END Contact Form -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop