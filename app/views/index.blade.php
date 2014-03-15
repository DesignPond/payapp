@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">
		
			<div class="row"><!-- start row -->													
				<div class="col-sm-12"><!-- strat col -->

					<h2><span class="glyphicon glyphicon-user"></span> &nbsp;Add a client and transaction from credit card</h2>
						
						@if(Session::has('status'))
						<div class="alert alert-dismissable alert-{{  Session::get('status') }}">
							@if(Session::has('message'))
								{{  Session::get('message') }}
							@endif
						</div>
						@endif
						
						<div class="payment-errors alert alert-dismissable alert-error"></div>	
									
						<form id="payment-form" class="row" action="<?php echo url('paymill/transaction'); ?>" method="POST">
							
								<input class="card-currency" name="card-currency" type="hidden" value="CHF" />
								<input class="card-amount-int" name="card-amount-int" type="hidden" value="5000" />
								
								<div class="row form-group">
									<div class="col-sm-4">
										<label>Email</label>
										<input name="email" type="text" value="" />	
									</div>
								</div>
													
								<div class="row form-group">
									<div class="col-sm-4">
									  	<label>Card number</label>
									    <input class="card-number form-control" type="text" size="20" />
									</div>
								</div>
								
								<div class="row form-group">
									<div class="col-sm-2">
									  	<label>CVC</label>
									    <input class="card-cvc form-control" type="text" size="4" />
									</div>
								</div>
								
								<div class="row form-group">
									<div class=" col-sm-4">
									    <label>Name</label>
									    <input class="card-holdername form-control" type="text" size="4" />
									</div>
								</div>
								
								<div class="row form-group">
									<div class=" col-sm-6">
									  	<label>Expiry date (MM/YYYY)</label>
									    <input class="card-expiry-month small" placeholder="MM" type="text" size="2" />
									    <input class="card-expiry-year small" placeholder="YYYY" type="text" size="4" />
									</div>
								</div>
												
								<p><input type="submit" class="btn btn-primary" Value="Submit "/></p>
				
						</form>
				
				</div> <!-- end col -->					
			</div><!-- End row -->

		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop