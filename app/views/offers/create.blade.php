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
					<h2 class="span10">New offer</h2>						
					<p class="span2"><a class="btn btn-small btn-peterriver pull-right" href="<?php echo url('offers'); ?>">Return to list</a></p>
				</div>	
					
				{{ Form::open(array('url' => 'offers', 'method' => 'post')) }}
					
						<div class="row-fluid form-group">
							<div class="span6">
								<label>Name</label>
								<input name="name" type="text" />
							</div>
						</div>	
						<div class="row-fluid form-group">
							<div class=" span6">
								<label>Interval</label>
								<select class="span12 form-control" name="interval">
									<option value="15 DAY">15 DAY</option> 
									<option value="1 WEEK">1 WEEK</option>
									<option value="1 MONTH">1 MONTH</option>
									<option value="1 YEAR">1 YEAR</option>
								</select>
							</div>
						</div>
						
						<div class="row-fluid form-group">
							<div class=" span3">
								<label>Amount </label>
								<input name="amount" type="text" value="" />
							</div>
							
							<div class="span3">
								<label>Currency</label>
								<input name="currency" type="text" value="" />
							</div>
						</div>
															
						<p><input type="submit" class="btn btn-small btn-primary" Value="Create "/></p>
					 					
				{{ Form::close() }}
				
				
				</div><!-- end content -->
				
			</div><!-- end col -->
		</div><!-- end row -->
						
	</div><!-- end static page -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop