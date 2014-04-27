@extends('layouts.master')

@section('content')

<?php  $custom = new Custom; ?>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="static-page"><!-- start static page  -->
					
		<div class="row-fluid"><!-- start row -->							
			<div class="span12"><!-- start col -->
			
				<div class="content"><!-- start content -->
				
					<div class="row-fluid">	
						<h2 class="span10">Thank you for your order!</h2>						
						<p class="span2"><a class="btn btn-small btn-peterriver pull-right" href="<?php echo url('shop'); ?>">Return to shop</a></p>
					</div>	
																
					<?php if(!empty($order)) {  ?>
						
						<div class="well"><!-- start well -->
							<h4>Review</h4>
							<div class="row-fluid">
							    <div class="span4">
								    <ul class="list-border">
										<li><strong>Order ID</strong></li>
										<li><strong>Price</strong></li>
										<li><strong>Delivery</strong></li>
									</ul>
							    </div>
							    <div class="span8">
								    <ul class="list-none">
										<li><?php echo $order->invoice_number; ?></li>
										<li><?php echo $order->subtotal/100; ?> CHF</li>
										<li><?php echo $order->shipping->name; ?> CHF</li>
									</ul>
							    </div>
							</div>
							
							<?php
							
								echo '<pre>';
								print_r($order);
								echo '</pre>';

							?>
						
						</div><!-- end well -->		
	
					<?php } ?>	
				
				</div><!-- end content -->
				
			</div><!-- end col -->
		</div><!-- end row -->
						
	</div><!-- end static page -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop