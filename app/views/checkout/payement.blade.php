@extends('layouts.master')

@section('content')

	<?php  $custom = new Custom; ?>
	
	<?php
	
		$paymentOption = 0;
		
		if( Session::has('payement_option') )
		{ 
			$paymentOption = Session::get('payement_option'); 
		}
		
	?>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	               
    <!-- Content section -->		
    <section class="main">
        
        <!-- Checkout / Billing Address -->
        <section class="checkout">


            <div class="container">
                 {{ Form::open(array('url' => 'checkout/reviewOrder', 'method' => 'post')) }} 
                   
                    <div class="row">
                        <div class="span9">
                            <div class="box">
                                
                                <!-- Checkout progress -->
                                <div id="checkout-progress">
                                    <ul class="nav nav-tabs">
                                        <li><a href="checkout.html"><i class="icon-map-marker icon-large"></i><span>Billing address</span></a></li>
                                        <li><a href="shipping.html"><i class="icon-envelope icon-large"></i><span>Shipping address</span></a></li>
                                        <li><a href="shipping-method.html"><i class="icon-truck icon-large"></i><span>Shipping method</span></a></li>
                                        <li class="active"><a href="payment-method.html"><i class="icon-money icon-large"></i><span>Payment method</span></a></li>
                                        <li><div><i class="icon-search icon-large"></i><span>Order review</span></div></li>
                                    </ul>					
                                </div>
                                <!-- End id="checkout-progress" -->
                                
                                <!-- Checkout content -->
                                <div id="checkout-content">
                                    <div class="box-header">                                                                                                    
                                        <h3>Payment method</h3>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h5>                                                    
                                    </div>
           
                                    <div class="box-content">
                                        <div class="payment-methods">
                                            <div class="row-fluid">
                                                <div class="span4">
                                                    <div class="box highlight">
                                                        <div class="hgroup title">
                                                            <h3>Paymill</h3>
                                                            <h5>Paymill makes it easy for developers to accept credit cards on the web.</h5>
                                                        </div>
                                                        <div class="box-content highlight">                                                                    
                                                            <input type="radio" <?php if($paymentOption == 1){ echo 'checked'; } ?> value="1" name="payement_option" id="option1">
                                                        </div>			
                                                    </div>
                                                </div>                                                        
                                            </div>
                                        </div>
                                    </div>
      
                                    <div class="box-footer">
                                        <div class="pull-left"><a href="<?php echo url('checkout/methodShipping'); ?>" class="btn btn-small"><i class="icon-chevron-left"></i> &nbsp; Shipping method</a></div>

                                        <div class="pull-right">                                                    
                                            <button type="submit" class="btn btn-primary">Order review &nbsp; <i class="icon-chevron-right"></i></button>
                                        </div>
                                    </div>					
                                </div>	
                                <!-- End id="checkout-content" -->
                                
                            </div>
                        </div>

                        <div class="span3">                                    
                            <div class="box">
							      @include('checkout.includes.total')	
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