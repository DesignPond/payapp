@extends('layouts.master')

@section('content')

<?php  $custom = new Custom; ?>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">

			<div class="row"><!-- start row -->
			
				<h1><span class="glyphicon glyphicon-saved"></span> &nbsp;Clients</h1>
				
				<div class="col-sm-12"><!-- start col -->
										
					<p><a class="btn btn-sm btn-info pull-right" href="<?php echo url('clients/create'); ?>">Add</a></p>
					<div class="spacer"></div>
					
					<table class="table-style-1">
						<thead>
							<tr>
								<th width="80px"><strong>Action</strong></th>
								<th><strong>Email</strong></th>
								<th><strong>Description</strong></th>
								<th><strong>Created</strong></th>
								<th><strong>Updated</strong></th>
							</tr>
						</thead>
						<tbody>
							<?php
								
								if(!empty($listClients))
								{
									foreach($listClients as $client)
									{
										echo '<tr>';
										
											echo '<td><a class="button blue" href="'.url('clients/'.$client['id']).'">édit</a></td>';
											echo '<td>'.$client['email'].'</td>';
											echo '<td>'.$client['description'].'</td>';
											echo '<td>'.$custom->formatFromTimestamp($client['created_at']).'</td>';
											echo '<td>'.$custom->formatFromTimestamp($client['updated_at']).'</td>';
											
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