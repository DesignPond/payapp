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
					<h2 class="span10">Update Offer</h2>						
					<p class="span2"><a class="btn btn-small btn-peterriver pull-right" href="<?php echo url('offers'); ?>">Return to list</a></p>
				</div>	
				
				<div class="well"><!-- start well -->
					<?php if(!empty($offer)) {  ?>
	
					{{ Form::open(array('route' => 'offers.update', 'method' => 'put' , 'class' => '' )) }}
							
						<div class="row-fluid form-group">
							
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
				
				</div><!-- end content -->
				
			</div><!-- end col -->
		</div><!-- end row -->
						
	</div><!-- end static page -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop