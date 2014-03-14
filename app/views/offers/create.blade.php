@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">

			<!-- Page Title -->
			<h1>Offers</h1>
			<!-- END Title -->
			
			<div class="row"><!-- start row -->
			
				<h2><span class="glyphicon glyphicon-saved"></span> &nbsp;New offer</h2>
					
				<form action="<?php echo url('offers'); ?>" method="POST">
				
					<div class="col-sm-6">
					
						<div class="row form-group">
							<div class="col-sm-12">
								<label>Name</label>
								<input name="name" type="text" />
							</div>
						</div>	
						<div class="row form-group">
							<div class=" col-sm-12">
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
							<div class=" col-sm-6">
								<label>Amount </label>
								<input name="amount" type="text" value="" />
							</div>
							
							<div class="col-sm-6">
								<label>Currency</label>
								<input name="currency" type="text" value="" />
							</div>
						</div>
															
						<p><input type="submit" class="btn btn-sm btn-primary" Value="Create "/></p>
						
					</div> 
					 					
				</form>
			</div><!-- End row -->

		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop