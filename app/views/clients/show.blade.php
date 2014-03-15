@extends('layouts.master')

@section('content')

<?php  $custom = new Custom; ?>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">
				
				<?php if(!empty($client)) {  ?>
				
				<h2><span class="glyphicon glyphicon-user"></span> &nbsp;Cindy Leschaud</h2>
				<p><strong>Email :</strong> <?php echo $client->getemail(); ?></p>
				
				<div class="row"><!-- start row -->
						
					<form action="<?php echo url('clients'); ?>" method="PUT">
					
						<div class="col-sm-12">
							
							<div class="row form-group">								
								<div class="col-sm-6">
									<label>Description</label>
									<input name="description" type="text" value="<?php echo $client->getdescription(); ?>" />
								</div>
								
								<div class="col-sm-2">
									<label>&nbsp;</label>
									<input name="id" type="hidden" value="<?php echo $client->getid(); ?>" />
									<input type="submit" class="btn btn-sm btn-primary" Value="Update"/>
								</div>								
							</div>
							
						</div> 
						 					
					</form>
				</div><!-- End row -->
	
				
				<div class="spacer"></div>
				<div class="spacer"></div>	
				
				<h2><span class="glyphicon glyphicon-credit-card"></span> &nbsp;Crédit cards</h2>
							
				<div class="row">
				
						<?php  
						
							$payement = $client->getpayment();
							
							if( !empty($payement) ){
							
								foreach($payement as $cardinfo)
								{
				
									$cardType    = $cardinfo->getcardType();
									$expireMonth = $cardinfo->getexpireMonth();
									$expireYear  = $cardinfo->getexpireYear();
									$lastFour    = $cardinfo->getlastFour();
								
						?>	
							
						<div class=" col-sm-4">
							<div class="panel panel-primary">
								<!-- Default panel contents -->
								<div class="panel-heading">Carte de crédit</div>
								<div class="panel-body">	
																	
										<form role="form">
			
											<p><strong>Card type :</strong> <?php echo $cardType; ?></p>
			
											<div class="row">									
												<div class="form-group col-sm-6">
													<label for="exampleInputEmail2">Expire month</label>
													<input value="<?php echo $expireMonth; ?>" type="text" class="form-control" disabled>
												</div>
												<div class="form-group col-sm-6">
													<label for="exampleInputPassword2">Expire year</label>
													<input value="<?php echo $expireYear; ?>" type="text" class="form-control" disabled>
												</div>
											<div class="row">	
											</div>
												<div class="form-group col-sm-12">
													<label for="exampleInputPassword2">Card 4 last digits</label>
													<input value="**** **** **** <?php echo $lastFour; ?>" type="text" class="form-control" disabled>
												</div>
											</div>
										</form>
				
									</div>
								</div>
							</div>
															
							<?php } }else{ echo '<p class=" col-sm-12">No credit card used</p>';} ?>
						</div>
						
						<div class="spacer"></div>
						<div class="spacer"></div>
						
						<h2><span class="glyphicon glyphicon-saved"></span> &nbsp;Transactions</h2>
						
						<p><a class="btn btn-sm btn-info pull-right" href="<?php echo url('clients/'.$client->getid().'/transaction'); ?>">add</a></p>
						
						<?php if(!empty($transactions)){ ?>
						
							<table class="table-style-1">
								<thead>
									<tr>
										<th width="40%"><strong>Description</strong></th>
										<th><strong>Amount</strong></th>
										<th><strong>Currency</strong></th>
										<th><strong>Date</strong></th>
										<th><strong>Card</strong></th>
									</tr>
								</thead>
								<tbody>
							
								<?php 
	
									foreach($transactions as $transaction){
										
										echo '<tr>';
	
											echo '<td>'.$transaction['description'].'</td>';									
											echo '<td>'.number_format(($transaction['amount']/100), 2).'</td>';
											echo '<td>'.$transaction['currency'].'</td>';	
											echo '<td>'.$custom->formatFromTimestamp($transaction['created_at']).'</td>';
											echo '<td>'.$transaction['payment']['card_type'].'</td>';
											
										echo '</tr>';										
									}		 
								
								?>						
								</tbody>
							</table>
						
						<?php } else{ echo '<p>No transaction</p>'; } ?>

				<?php } ?>				
		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop