@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="static-page"><!-- start static page  -->
					
		<div class="row-fluid"><!-- start row -->							
			<div class="span12"><!-- start col -->
			
				<div class="content"><!-- start content -->
					
					<h2>Transaction</h2>
					
					<h4>Add a transaction from credit card with client</h4>
					
					<p><?php echo $client->getemail(); ?></p>
					
					@if(Session::has('status'))
					<div class="alert alert-dismissable alert-{{  Session::get('status') }}">
						@if(Session::has('message'))
							{{  Session::get('message') }}
						@endif
					</div>
					@endif
					
					<?php if(!empty($client)) {  ?>	
	
						<div class="payment-errors alert alert-dismissable alert-error"></div>	
									
						<form id="payment-form" action="<?php echo url('paymill/transactionClient'); ?>" method="POST">
														
							<input class="clientToken" name="clientToken" type="hidden" value="<?php echo $client->getid(); ?>" />						  						  
							<input class="card-amount-int" name="card-amount-int" type="hidden" value="20000" />
							<input class="card-currency" name="card-currency" type="hidden" value="CHF" />
							
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
							  					
						</form>
					
					<?php } ?>
				
				</div><!-- end content -->
				
			</div><!-- end col -->
		</div><!-- end row -->
						
	</div><!-- end static page -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop