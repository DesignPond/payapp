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
						<h2 class="span10">Offers</h2>						
						<p class="span2"><a class="btn btn-small btn-peterriver pull-right" href="<?php echo url('offers/create'); ?>">Add</a></p>
					</div>	
				
					<?php if(!empty($offers)) {	 ?>
						
					<table class="table">
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
											echo '<a class="btn btn-small btn-primary" href="'.url('offers/'.$offer['id']).'">Update</a>';
											echo '<button type="submit" data-action="offer" class="btn btn-small btn-alizarin deleteAction">delete</button>';
											echo '</div>'; 
										echo Form::close();												
										
									echo '</td>';										
									
								echo '</tr>';										
							}		
							
						?>	
											
						</tbody>
					</table>
					
					<?php }else{ echo 'No offers yet!';  } ?>
					
				
				</div><!-- end content -->
				
			</div><!-- end col -->
		</div><!-- end row -->
						
	</div><!-- end static page -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop