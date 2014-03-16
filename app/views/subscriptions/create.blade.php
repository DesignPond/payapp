@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="static-page"><!-- start static page  -->
					
		<div class="row-fluid"><!-- start row -->							
			<div class="span12"><!-- start col -->
			
				<div class="content"><!-- start content -->

					<div class="row-fluid">	
						<h2 class="span10">New subscription</h2>						
						<p class="span2"><a class="btn btn-small btn-peterriver pull-right" href="<?php echo url('subscriptions'); ?>">Return to list</a></p>
					</div>	
		
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
						  
						<div class="row-fluid form-group">
							<div class=" span6">
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
						<div class="row-fluid form-group">
							<div class=" span6">
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
						
						<div class="row-fluid form-group">
							<div class="span4">
							  	<label>Card number</label>
							    <input class="card-number form-control" type="text" size="20" />
							</div>
						</div>
						
						<div class="row-fluid form-group">
							<div class="span2">
							  	<label>CVC</label>
							    <input class="card-cvc form-control" type="text" size="4" />
							</div>
						</div>
						
						<div class="row-fluid form-group">
							<div class="span6">
							    <label>Name</label>
							    <input class="card-holdername form-control" type="text" size="4" />
							</div>
						</div>
						
						<div class="row-fluid form-group">
							<div class="span6">
							
							  	<label>Expiry date (MM/YYYY)</label>
							  	<div class="row-fluid">
							    	<input class="card-expiry-month span3" placeholder="MM" type="text" size="2" />
							   		<input class="card-expiry-year span3" placeholder="YYYY" type="text" size="4" />
							    </div>
							</div>
						</div>
											
						<p><input type="submit" class="btn btn-small btn-primary" Value="Submit "/></p>
					 					
					{{ Form::close() }}
				
				</div><!-- end content -->
				
			</div><!-- end col -->
		</div><!-- end row -->
						
	</div><!-- end static page -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop