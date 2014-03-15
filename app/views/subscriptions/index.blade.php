@extends('layouts.master')

@section('content')

<?php  $custom = new Custom; ?>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">

			<div class="row"><!-- start row -->													
				<div class="col-sm-12"><!-- strat col -->
			
					<h2><span class="glyphicon glyphicon-saved"></span> &nbsp;Subscriptions</h2>
					
					<p><a class="btn btn-sm btn-info pull-right" href="<?php echo url('subscriptions/create'); ?>">Add</a></p>
					<div class="spacer"></div>		
				
					<?php if(!empty($subscriptions)) {	 ?>
						
					<table class="table-style-1">
						<thead>
							<tr>
								<th width="20%"><strong>Offer</strong></th>
								<th width="10%"><strong>Payement</strong></th>
								<th width="25%"><strong>Client</strong></th>
								<th><strong>Date creation</strong></th>
								<th><strong>Next capture</strong></th>
								<th class="text-right" width="25%"><strong>Action</strong></th>
							</tr>
						</thead>
						<tbody>
					
						<?php 	
																	
							foreach($subscriptions as $subscription){
								
								echo '<tr>';

									echo '<td>'.$subscription['offer']['name'].'</td>';									
									echo '<td>'.$subscription['payment']['card_type'].'</td>';	
									echo '<td>'.$subscription['client']['email'].'</td>';
									echo '<td>'.$custom->formatFromTimestamp($subscription['created_at']).'</td>';
									echo '<td>'.$custom->formatFromTimestamp($subscription['next_capture_at']).'</td>';
									echo '<td>';
	
										echo Form::open(array( 'url' => 'subscriptions/'.$subscription['id'] , 'method' => 'delete' ));
											echo '<div class="btn-group pull-right">';
											echo Form::hidden('id' , $subscription['id'] ); 
											// echo '<a class="btn btn-sm btn-primary" href="'.url('subscriptions/'.$subscription['id']).'">Update</a>';
											echo '<button type="submit" data-action="offer" class="btn btn-sm btn-danger deleteAction">delete</button>';
											echo '</div>'; 
										echo Form::close();												
										
									echo '</td>';										
									
								echo '</tr>';	
										
							}		
							
						?>	
											
						</tbody>
					</table>
					
					<?php }else{ echo 'No subscription yet!';  } ?>
					
				</div><!-- end col -->
			</div><!-- end row -->
			
		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop