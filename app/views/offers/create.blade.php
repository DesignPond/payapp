@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">

			<div class="row"><!-- start row -->													
				<div class="col-sm-12"><!-- strat col -->
				
				<p><a class="btn btn-sm btn-info pull-right" href="<?php echo url('clients'); ?>">Return to list</a></p>
				<div class="spacer"></div>	
			
				<h2><span class="glyphicon glyphicon-saved"></span> &nbsp;New offer</h2>
					
				{{ Form::open(array('url' => 'offers', 'method' => 'post')) }}
					
						<div class="row form-group">
							<div class="col-sm-6">
								<label>Name</label>
								<input name="name" type="text" />
							</div>
						</div>	
						<div class="row form-group">
							<div class=" col-sm-6">
								<label>Interval</label>
								<select class="col-sm-12 form-control" name="interval">
									<option value="15 DAY">15 DAY</option> 
									<option value="1 WEEK">1 WEEK</option>
									<option value="1 MONTH">1 MONTH</option>
									<option value="1 YEAR">1 YEAR</option>
								</select>
							</div>
						</div>
						
						<div class="row form-group">
							<div class=" col-sm-3">
								<label>Amount </label>
								<input name="amount" type="text" value="" />
							</div>
							
							<div class="col-sm-3">
								<label>Currency</label>
								<input name="currency" type="text" value="" />
							</div>
						</div>
															
						<p><input type="submit" class="btn btn-primary" Value="Create "/></p>
					 					
				{{ Form::close() }}
				
				</div><!-- end col -->
			</div><!-- end row -->

		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop