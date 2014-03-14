@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">

			<!-- Page Title -->
			<h1>Offers</h1>
			<!-- END Title -->
			
			<div class="row"><!-- start row -->
			
				<h2><span class="glyphicon glyphicon-saved"></span> &nbsp;Offers</h2>
				
				<div class="col-sm-12">
					
					<p><a class="btn btn-sm btn-info pull-right" href="<?php echo url('offers/create'); ?>">Add</a></p>
					<div class="spacer"></div>
				
					<?php if(!empty($offers)) {	 ?>
						
					<table class="table-style-1">
						<thead>
							<tr>
								<th width="25%"><strong>Name</strong></th>
								<th><strong>Interval</strong></th>
								<th><strong>Currency</strong></th>
								<th><strong>Amount</strong></th>
								<th class="text-right" width="25%"><strong>Action</strong></th>
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
										echo '<td>';
		
											echo Form::open(array( 'url' => 'offers/'.$offer['id'] , 'method' => 'delete' ));
												echo '<div class="btn-group pull-right">';
												echo Form::hidden('id' , $offer['id'] ); 
												echo '<a class="btn btn-sm btn-primary" href="'.url('offers/'.$offer['id']).'">Update</a>';
												echo '<button type="submit" data-action="offer" class="btn btn-sm btn-danger deleteAction">delete</button>';
												echo '</div>'; 
											echo Form::close();												
											
										echo '</td>';										
										
									echo '</tr>';										
								}		
						?>	
											
						</tbody>
					</table>
					
					<?php }else{ echo 'No offers yet!';  } ?>
					
				</div><!-- End col -->
				
			</div><!-- End row -->
			
		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop