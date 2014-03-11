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
					<h1>Contact Us</h1>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- END Title -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- Intro -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- END Intro -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- Spacer x 2 -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<div class="spacer"></div>
					<div class="spacer"></div>
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- END Spacer x 2 -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					<!-- Contact Form -->
					<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
						
					<form id="payment-form" action="#" method="POST">
	
						  <input class="card-amount-int" type="hidden" value="15" />
						  <input class="card-currency" type="hidden" value="EUR" />
						
						  <div class="form-row"><label>Card number</label>
						    <input class="card-number" type="text" size="20" /></div>
						
						  <div class="form-row"><label>CVC</label>
						    <input class="card-cvc" type="text" size="4" /></div>
						
						  <div class="form-row"><label>Name</label>
						    <input class="card-holdername" type="text" size="4" /></div>
						
						  <div class="form-row"><label>Expiry date (MM/YYYY)</label>
						    <input class="card-expiry-month" type="text" size="2" />
						    <span></span>
						    <input class="card-expiry-year" type="text" size="4" />
						  </div>
											
						  <button class="submit-button" type="submit">Submit</button>
					
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