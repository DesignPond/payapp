@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="static-page"><!-- start static page  -->
					
		<div class="row-fluid"><!-- start row -->							
			<div class="span12"><!-- start col -->
			
				<div class="content"><!-- start content -->
					
					<h2>Payment</h2>
					
					@if(Session::has('status'))
					<div class="alert alert-dismissable alert-{{  Session::get('status') }}">
						@if(Session::has('message'))
							{{  Session::get('message') }}
						@endif
					</div>
					@endif
					
					<?php if(!empty($order)) {  ?>	
	
						<div class="payment-errors alert alert-dismissable alert-error"></div>	
									
						<form id="payment-form" action="<?php echo url('payment'); ?>" method="POST">
																			  						  
							<input class="card-amount-int" name="card-amount-int" type="hidden" value="<?php echo $order->total; ?>" />
							<input class="card-currency" name="card-currency" type="hidden" value="CHF" />
							<input name="email" type="hidden" value="<?php echo $order->user->email; ?>" />
							<input name="invoice" type="hidden" value="<?php echo $order->invoice_number; ?>" />
							<input name="order_id" type="hidden" value="<?php echo $order->id; ?>" />
							
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