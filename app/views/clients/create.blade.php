@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">
			
			<div class="row"><!-- start row -->
			
				<h1><span class="glyphicon glyphicon-saved"></span> &nbsp;New client</h1>
					
				<form action="<?php echo url('clients'); ?>" method="POST">
				
					<div class="col-sm-12">
						
						<div class="row form-group">
							<div class="col-sm-4">
								<label>Email</label>
								<input name="email" type="text" value="" />
							</div>
							
							<div class="col-sm-6">
								<label>Description</label>
								<input name="description" type="text" value="" />
							</div>
							
							<div class="col-sm-2">
								<label>&nbsp;</label>
								<input type="submit" class="btn btn-sm btn-primary" Value="Create"/>
							</div>
							
						</div>
						
					</div> 
					 					
				</form>
			</div><!-- End row -->

		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop