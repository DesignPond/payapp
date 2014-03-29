@extends('layouts.master')

@section('content')

	<?php  $custom = new Custom; ?>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	               
	<!-- Content section -->		
    <section class="main">
        
        <!-- Checkout / Billing Address -->
        <section class="checkout">

            <div class="container">
                <form enctype="multipart/form-data" action="shipping.html" method="post">
                   
                    <div class="row">
                        <div class="span9">
                            <div class="box">
                                
                                <!-- Checkout progress -->
                                <div id="checkout-progress">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="<?php echo url('checkout/billing'); ?>"><i class="icon-map-marker icon-large"></i><span>Billing address</span></a></li>
                                        <li><div><i class="icon-envelope icon-large"></i><span>Shipping address</span></div></li>
                                        <li><div><i class="icon-truck icon-large"></i><span>Shipping method</span></div></li>
                                        <li><div><i class="icon-money icon-large"></i><span>Payment method</span></div></li>
                                        <li><div><i class="icon-search icon-large"></i><span>Order review</span></div></li>
                                    </ul>					
                                </div>
                                <!-- End id="checkout-progress" -->
                                
                                <!-- Checkout content -->
                                <div id="checkout-content">
                                    <div class="box-header">
                                    	<div class="row-fluid">
                                            <div class="span6">
												<h3>Billing address</h3>
		                                        <h5>Verify your infos</h5>
                                            </div>
                                            <div class="span6 text-right">
												 <button class="btn btn-mini btn-belizehole">Edit your billing address</button>
                                            </div>
                                    	</div>                                       
                                    </div>

                                    <div class="box-content">
                                        <div class="row-fluid">
                                            <div class="span6">
                                            
                                            	<div class="row-fluid">
                                                    <p class="span4"><strong>First name</strong></p>
													<p class="span8"><?php echo $user->first_name; ?></p>
												</div>
                                            	<div class="row-fluid">
                                                    <p class="span4"><strong>Last name</strong></p>
													<p class="span8"><?php echo $user->last_name; ?></p>
												</div>
                                            	<div class="row-fluid">
                                                    <p class="span4"><strong>Email</strong></p>
													<p class="span8"><?php echo $user->email; ?></p>
												</div>
                                            	<div class="row-fluid">
                                                    <p class="span4"><strong>Phone</strong></p>
													<p class="span8"><?php echo $user->address->phone; ?></p>
												</div>

                                            </div>

                                            <div class="span6">
                                            
                                             	<div class="row-fluid">
                                                    <p class="span4"><strong>Company</strong></p>
													<p class="span8"><?php echo $user->address->company; ?></p>
												</div>
                                            	<div class="row-fluid">
                                                    <p class="span4"><strong>Address</strong></p>
													<p class="span8"><?php echo $user->address->address; ?></p>
												</div>
												
												<div class="row-fluid">
		                                            <p class="span4"><strong>Zip / City</strong></p>
													<p class="span8"><?php echo $user->address->zip; ?>, <?php echo $user->address->city; ?></p>                                                                                              
                                                </div>                                              
	                                           	<div class="row-fluid">
	                                                <p class="span4"><strong>Country</strong></p>
													<p class="span8"><?php echo $countries[$user->address->country]; ?></p>
												</div>
                                                
                                            </div>
                                        </div>	
                                    </div>

                                    <div class="box-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo url('cart'); ?>" class="btn btn-small"><i class="icon-chevron-left"></i> &nbsp; Back to cart</a>
                                        </div>

                                        <div class="pull-right">                                                    
                                            <a href="<?php echo url('checkout/shipping'); ?>" class="btn btn-primary">Shipping address &nbsp; <i class="icon-chevron-right"></i></a>
                                        </div>
                                    </div>					
                                </div>	
                                <!-- End id="checkout-content" -->
                                
                            </div>
                        </div>

                        <div class="span3">                                    
                            <div class="box">
                            
							    <!-- Order totals -->
							    <div id="checkout-totals">
							        <div class="hgroup title">
							            <h3>Order total</h3>
							            <h5>Shipping costs and taxes will be calculated during checkout</h5>
							        </div>
							        <ul class="price-list">
							            <li>Subtotal: <strong>CHF <?php echo ( !empty($cartTotalPrice) ? $cartTotalPrice : 0 ); ?></strong></li>
                                
							            <li>Shipping: <strong>CHF 0.00</strong></li>
							            <li class="important">Total: <strong>CHF <?php echo ( !empty($subtotal) ? $subtotal : 0 ); ?></strong></li>
							        </ul>
							    </div>
							    <!-- End id="checkout-totals" -->
							</div>                               
						</div>
 
                    </div>
                </form>
            </div>	
        </section>
        <!-- End class="checkout" -->
        
    </section>
    <!-- End class="main" -->

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop