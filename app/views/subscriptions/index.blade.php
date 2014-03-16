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
						<h2 class="span10">Subscriptions</h2>						
						<p class="span2"><a class="btn btn-small btn-peterriver pull-right" href="<?php echo url('subscriptions/create'); ?>">Add</a></p>
					</div>	
				
					<?php if(!empty($subscriptions)) {	 ?>
						
					<table class="table">
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
											echo '<button type="submit" data-action="offer" class="btn btn-small btn-alizarin deleteAction">delete</button>';
											echo '</div>'; 
										echo Form::close();												
										
									echo '</td>';										
									
								echo '</tr>';	
										
							}		
							
						?>	
											
						</tbody>
					</table>
					
					<?php }else{ echo 'No subscription yet!';  } ?>
					
				</div><!-- end content -->
				
			</div><!-- end col -->
		</div><!-- end row -->
						
	</div><!-- end static page -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop