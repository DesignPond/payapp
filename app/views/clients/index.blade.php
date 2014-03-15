@extends('layouts.master')

@section('content')

<?php  $custom = new Custom; ?>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">

			<div class="row"><!-- start row -->							
				<div class="col-sm-12"><!-- start col -->
			
				<h2><span class="glyphicon glyphicon-user"></span> &nbsp;Clients</h2>
										
					<p><a class="btn btn-sm btn-info pull-right" href="<?php echo url('clients/create'); ?>">Add</a></p>
					<div class="spacer"></div>
					
					<table class="table-style-1">
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
													echo '<a class="btn btn-sm btn-primary" href="'.url('clients/'.$client['id']).'">Update</a>';
													echo '<button type="submit" data-action="client" class="btn btn-sm btn-danger deleteAction">delete</button>';
													echo '</div>'; 
												echo Form::close();												
												
											echo '</td>';	
											
										echo '</tr>';
									}
								}
								
							?>
	
						</tbody>
					</table>
					
				</div><!-- end col -->
			</div><!-- end row -->
			
		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop