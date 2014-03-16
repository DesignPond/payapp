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
					<h2 class="span10">Client name</h2>						
					<p class="span2"><a class="btn btn-small btn-peterriver pull-right" href="<?php echo url('clients'); ?>">Return to list</a></p>
				</div>	
															
				<?php if(!empty($client)) {  ?>
					
					<div class="well"><!-- start well -->
						
						{{ Form::open(array('route' => 'clients.update', 'method' => 'put')) }}
								
							<div class="row-fluid form-group">
							
								<div class="span4">
									<label>Email</label>
									<input name="email" type="text" value="<?php echo $client->getemail(); ?>" />
								</div>
															
								<div class="span6">
									<label>Description</label>
									<input name="description" type="text" value="<?php echo $client->getdescription(); ?>" />
								</div>
								
								<div class="span2">
									<label>&nbsp;</label>
									<input name="id" type="hidden" value="<?php echo $client->getid(); ?>" />
									<input type="submit" class="btn btn-small btn-primary" Value="Update"/>
								</div>	
															
							</div>							
													 					
						{{ Form::close() }}
					
					</div><!-- end well -->
			
					<h2>Credit cards</h2>
								
					<?php 
					
						$payement = $client->getpayment();
						
						if( !empty($payement) ){
						
													
							/* ================================
								Cut array in chunks
							=================================== */ 
							
							$chunk = array_chunk($payement, 3);

							foreach($chunk as $card)
							{
							
					 ?>	
						
						<div class="row-fluid"><!-- start row for CC -->
							
							<?php
								
								foreach($card as $cardinfo)
								{
				
									$cardType    = $cardinfo->getcardType();
									$expireMonth = $cardinfo->getexpireMonth();
									$expireYear  = $cardinfo->getexpireYear();
									$lastFour    = $cardinfo->getlastFour();
									
							?>
								
								<div class="span4">
									<div class="well">
										<form role="form">			
											<p><strong>Card type :</strong> <?php echo $cardType; ?></p>
			
											<div class="row-fluid">									
												<div class="form-group span4">
													<label for="exampleInputEmail2">Expire month</label>
													<input value="<?php echo $expireMonth; ?>" type="text" class="form-control" disabled>
												</div>
												<div class="form-group span4">
													<label for="exampleInputPassword2">Expire year</label>
													<input value="<?php echo $expireYear; ?>" type="text" class="form-control" disabled>
												</div>
											</div>
											<div class="row-fluid">	
												<div class="form-group span12">
													<label for="exampleInputPassword2">Card 4 last digits</label>
													<input value="**** **** **** <?php echo $lastFour; ?>" type="text" class="form-control" disabled>
												</div>
											</div>
										</form>
									</div>
								</div><!-- end col -->
								
								<?php } ?>							
							
						</div><!-- End row -->
						
						<?php } ?>
						
						<?php } else{ echo '<p class="span12">No credit card used</p>';} ?>
						
						<div class="row-fluid">	
							<h2 class="span11">Transactions</h2>						
							<p class="span1"><a class="btn btn-small btn-peterriver" href="<?php echo url('clients/'.$client->getid().'/transaction'); ?>">add</a></p>
						</div>
						<?php if(!empty($transactions)){ ?>
						
							<table class="table">
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
				
				</div><!-- end content -->
				
			</div><!-- end col -->
		</div><!-- end row -->
						
	</div><!-- end static page -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop