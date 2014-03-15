@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<div class="main-content">
		<div class="main-content-inner content-width">
			
			<div class="row"><!-- start row -->
			
				<h2><span class="glyphicon glyphicon-saved"></span> &nbsp;Update offer</h2>
				
				<p><a class="btn btn-sm btn-info" href="<?php echo url('offers'); ?>">Return to list</a></p>
				<div class="spacer"></div>	
				
				<div class="well"><!-- start well -->
					<?php if(!empty($offer)) {  ?>
	
					{{ Form::open(array('route' => 'offers.update', 'method' => 'put' , 'class' => '' )) }}
							
						<div class="row form-group">
							
							<div class="col-sm-11">
								<label>Name</label>
								<input name="name" type="text" value="<?php echo $offer->getname(); ?>" />
							</div>	
	
							<div class="form-group">
								<label>&nbsp;</label>
								<input name="id" type="hidden" value="<?php echo $offer->getid(); ?>" />															
								<input type="submit" class="btn btn-primary" Value="Update "/>
							</div>
						
						</div>	
																		 					
					{{ Form::close() }}
						
						<p class="clear"></p>
					
					<?php } ?>
				</div><!-- end well -->
			</div><!-- End row -->

		</div>
	</div>
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop