@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">

			<!-- Page Title -->
			<h1>Offer</h1>
			<!-- END Title -->
			
			<div class="row"><!-- start row -->
			
				<h2><span class="glyphicon glyphicon-saved"></span> &nbsp;Offers</h2>
				
				<?php if(!empty($offers)) {	 ?>
					
				<table class="table-style-1">
					<thead>
						<tr>
							<th width="40%"><strong>Name</strong></th>
							<th><strong>Interval</strong></th>
							<th><strong>Currency</strong></th>
							<th><strong>Amount</strong></th>
						</tr>
					</thead>
					<tbody>
				
					<?php 												
							foreach($offers as $offer){
								
								echo '<tr>';

									echo '<td>'.$offer['name'].'</td>';									
									echo '<td>'.$offer['interval'].'</td>';	
									echo '<td>'.$offer['currency'].'</td>';
									echo '<td>'.number_format(($offer['amount']/100), 2).'</td>';									
									
								echo '</tr>';										
							}		
					?>	
										
					</tbody>
				</table>
				
				<?php }else{ echo 'No offers yet!';  } ?>
				
			</div><!-- End row -->
			
			<div class="spacer"></div>
			<div class="spacer"></div>
			
			<div class="row"><!-- start row -->
			
				<h2><span class="glyphicon glyphicon-saved"></span> &nbsp;New offer</h2>
					
				<form action="<?php echo url('paymill/newOffer'); ?>" method="POST">
				
					<div class="col-sm-6">
					
						<div class="row form-group">
							<div class="col-sm-12">
								<label>Name</label>
								<input name="name" type="text" />
							</div>
						</div>	
						<div class="row form-group">
							<div class=" col-sm-12">
								<label>Interval</label>
								<select class="col-sm-12 form-control" name="interval">
									<option value="15 DAY">15 DAY</option> 
									<option value="1 WEEK">1 WEEK</option>
									<option value="1 MONTH">1 MONTH</option>
									<option value="1 YEAR">1 YEAR</option>
								</select>
							</div>
						</div>
						
						<div class="row form-group">
							<div class=" col-sm-6">
								<label>Amount </label>
								<input name="amount" type="text" value="" />
							</div>
							
							<div class="col-sm-6">
								<label>Currency</label>
								<input name="currency" type="text" value="" />
							</div>
						</div>
															
						<p><input type="submit" class="btn btn-sm btn-primary" Value="Create "/></p>
						
					</div> 
					 					
				</form>
			</div><!-- End row -->

		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop