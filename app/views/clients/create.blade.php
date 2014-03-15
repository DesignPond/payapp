@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">
			
			<div class="row"><!-- start row -->							
				<div class="col-sm-12"><!-- start col -->
			
					<p><a class="btn btn-sm btn-info pull-right" href="<?php echo url('clients'); ?>">Return to list</a></p>
					<div class="spacer"></div>	
				
					<h2><span class="glyphicon glyphicon-user"></span> &nbsp;New client</h2>
					
					<div class="well"><!-- start well -->
						
						{{ Form::open(array('url' => 'clients', 'method' => 'post')) }}
	
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
									<input type="submit" class="btn btn-primary" Value="Create"/>
								</div>
								
							</div>
							 					
						{{ Form::close() }}
					
					</div><!-- end well --> 
				
				</div><!-- end col -->
			</div><!-- end row -->

		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop