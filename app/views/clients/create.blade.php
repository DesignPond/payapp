@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="static-page"><!-- start static page  -->
					
		<div class="row-fluid"><!-- start row -->							
			<div class="span12"><!-- start col -->
			
				<div class="content"><!-- start content -->
			
					<p><a class="btn btn-small btn-peterriver pull-right" href="<?php echo url('clients'); ?>">Return to list</a></p>
					<div class="spacer"></div>	
				
					<h2>New client</h2>
					
					<div class="well"><!-- start well -->
						
						{{ Form::open(array('url' => 'clients', 'method' => 'post')) }}
	
							<div class="row-fluid form-group">
							
								<div class="span4">
									<label>Email</label>
									<input name="email" type="text" value="" />
								</div>
								
								<div class="span6">
									<label>Description</label>
									<input name="description" type="text" value="" />
								</div>
								
								<div class="span2">
									<label>&nbsp;</label>
									<input type="submit" class="btn btn-small btn-primary" Value="Create"/>
								</div>
								
							</div>
							 					
						{{ Form::close() }}
					
					</div><!-- end well --> 
				
				</div><!-- end content -->
				
			</div><!-- end col -->
		</div><!-- end row -->
						
	</div><!-- end static page -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop