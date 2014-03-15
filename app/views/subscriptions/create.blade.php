@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">

			<div class="row"><!-- start row -->													
				<div class="col-sm-12"><!-- strat col -->
				
				<p><a class="btn btn-sm btn-info pull-right" href="<?php echo url('subscriptions'); ?>">Return to list</a></p>
				<div class="spacer"></div>	
			
				<h2><span class="glyphicon glyphicon-saved"></span> &nbsp;New subscription</h2>
		
					@if(Session::has('status'))
					<div class="alert alert-dismissable alert-{{  Session::get('status') }}">
						@if(Session::has('message'))
							{{  Session::get('message') }}
						@endif
					</div>
					@endif
						
					<form id="payment-form" action="<?php echo url('subscriptions'); ?>" method="POST">
	
						<input class="card-amount-int" name="card-amount-int" type="hidden" value="20000" />
						<input class="card-currency" name="card-currency" type="hidden" value="CHF" />
						  
						<div class="row form-group">
							<div class=" col-sm-6">
								<label>Client</label>
								<select class="form-control" name="client">
									<?php 
										if(!empty($clients)){ 
										
											foreach($clients as $client){ ?>
										
											<option value="<?php echo $client['id']; ?>"><?php echo $client['email']; ?></option> 	
										
									<?php } } ?>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<div class=" col-sm-6">
								<label>Offer</label>
								<select class="form-control" name="offer">
									<?php 
										if(!empty($offers)){ 
										
											foreach($offers as $offer){ ?>
										
											<option value="<?php echo $offer['id']; ?>"><?php echo $offer['name']; ?></option> 	
										
									<?php } } ?>
								</select>
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
							<div class=" col-sm-6">
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
					 					
					{{ Form::close() }}
				
				</div><!-- end col -->
			</div><!-- end row -->

		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop