@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="static-page"><!-- start static page  -->
					
		<div class="row-fluid"><!-- start row -->							
			<div class="span12"><!-- start col -->
			
				<div class="content"><!-- start content -->
			
					<p><a class="btn btn-small btn-peterriver pull-right" href="<?php echo url('/'); ?>">Home</a></p>
				
					<h2>Error</h2>
					
					<div class="well"><!-- start well -->
						
						<p>Une erreur est survenue</p>
						<p>Code : </p>
					
					</div><!-- end well --> 
				
				</div><!-- end content -->
				
			</div><!-- end col -->
		</div><!-- end row -->
						
	</div><!-- end static page -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop