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
               {{ Form::open(array('url' => 'checkout/methodPayment', 'method' => 'post')) }} 
                   
                    <div class="row">
                        <div class="span9">
                            <div class="box">
                                
                                <!-- Checkout progress -->
                                <div id="checkout-progress">
                                    <ul class="nav nav-tabs">
                                        <li><a href="checkout.html"><i class="icon-map-marker icon-large"></i><span>Billing address</span></a></li>
                                        <li><a href="shipping.html"><i class="icon-envelope icon-large"></i><span>Shipping address</span></a></li>
                                        <li class="active"><a href="shipping-method.html"><i class="icon-truck icon-large"></i><span>Shipping method</span></a></li>
                                        <li><div><i class="icon-money icon-large"></i><span>Payment method</span></div></li>
                                        <li><div><i class="icon-search icon-large"></i><span>Order review</span></div></li>
                                    </ul>					
                                </div>
                                <!-- End id="checkout-progress" -->
                                
                                <!-- Checkout content -->
                                <div id="checkout-content">
                                    <div class="box-header">                                                                                                    
                                        <h3>Shipping method</h3>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h5>                                                    
                                    </div>

                                    <div class="box-content">
                                        <div class="shipping-methods">
                                            <div class="row-fluid">
                                           
											@if(!empty($shipping))
												@foreach($shipping as $id => $method)
                                                <div class="span6">
                                                    <div class="box highlight">
                                                        <div class="hgroup title">
                                                            <h3><?php echo $method['name']; ?></h3>
                                                            <h5><?php echo $method['description']; ?></h5>
                                                        </div>
                                                        <div class="box-content highlight">
                                                            <div class="price">
                                                                <strong><?php echo $method['price']; ?></strong>
                                                            </div>
                                                            <input type="radio" value="<?php echo $id; ?>" name="shipping_option" id="option1">
                                                        </div>			
                                                    </div>
                                                </div>
                                                @endforeach
                                             @endif   
                                               
                                            </div>
                                        </div>
                                    </div>                                    
                                  
                                    <div class="box-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo url('checkout/shipping'); ?>" class="btn btn-small">
                                                <i class="icon-chevron-left"></i> &nbsp; Shipping address
                                            </a>
                                        </div>
                                        <div class="pull-right">                                                    
                                            <button type="submit" class="btn btn-primary">Payment method &nbsp; <i class="icon-chevron-right"></i></button>
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
                {{ Form::close() }}
            </div>	
        </section>
        <!-- End class="checkout" -->
        
    </section>
    <!-- End class="main" -->

    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop