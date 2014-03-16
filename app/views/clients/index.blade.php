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
						<h2 class="span10">Clients</h2>						
						<p class="span2"><a class="btn btn-small btn-peterriver pull-right" href="<?php echo url('clients/create'); ?>">Add</a></p>
					</div>	
					
					<table class="table">
						<thead>
							<tr>
								<th width="25%"><strong>Email</strong></th>
								<th width="27%"><strong>Description</strong></th>
								<th><strong>Created</strong></th>
								<th><strong>Updated</strong></th>
								<th><strong>Action</strong></th>
							</tr>
						</thead>
						<tbody>
							<?php
								
								if(!empty($clients))
								{
									foreach($clients as $client)
									{
										echo '<tr>';
																					
											echo '<td>'.$client['email'].'</td>';
											echo '<td>'.$client['description'].'</td>';
											echo '<td>'.$custom->formatFromTimestamp($client['created_at']).'</td>';
											echo '<td>'.$custom->formatFromTimestamp($client['updated_at']).'</td>';
											echo '<td>';
		
												echo Form::open(array( 'url' => 'clients/'.$client['id'] , 'method' => 'delete' ));
													echo '<div class="btn-group pull-right">';
													echo Form::hidden('id' , $client['id'] ); 
													echo '<a class="btn btn-small btn-primary" href="'.url('clients/'.$client['id']).'">Update</a>';
													echo '<button type="submit" data-action="client" class="btn btn-small btn-alizarin deleteAction">delete</button>';
													echo '</div>'; 
												echo Form::close();												
												
											echo '</td>';	
											
										echo '</tr>';
									}
								}
								
							?>
		
						</tbody>
					</table>
				
				</div><!-- end content -->
				
			</div><!-- end col -->
		</div><!-- end row -->
						
	</div><!-- end static page -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop