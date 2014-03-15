@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">

			<!-- Page Title -->
			<h1>Offer</h1>
			<!-- END Title -->
			
			<div class="row"><!-- start row -->
			
				<h1><span class="glyphicon glyphicon-saved"></span> &nbsp;Update offer</h1>
				
				<?php if(!empty($offer)) {  ?>
	
				<form class="form-inline" action="<?php echo url('paymill/updateOffer'); ?>" method="POST">
						
					<div class="form-group col-sm-6">
						<label class="sr-only">Name</label>
						<input name="name" type="text" value="<?php echo $offer->getname(); ?>" />
					</div>	
					
					<input name="id" type="hidden" value="<?php echo $offer->getid(); ?>" />															
					<input type="submit" class="btn btn-sm btn-primary" Value="Update "/>
					 					
				</form>
				
				<?php } ?>
				
			</div><!-- End row -->

		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop