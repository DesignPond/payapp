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
                                        <li class="active">
                                            <a href="<?php echo url('checkout/billing'); ?>">
                                                <i class="icon-map-marker icon-large"></i>
                                                <span>Billing address</span>
                                            </a>
                                        </li>
                                        <li>
                                            <div>
                                                <i class="icon-envelope icon-large"></i>
                                                <span>Shipping address</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <i class="icon-truck icon-large"></i>
                                                <span>Shipping method</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <i class="icon-money icon-large"></i>
                                                <span>Payment method</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <i class="icon-search icon-large"></i>
                                                <span>Order review</span>
                                            </div>
                                        </li>
                                    </ul>					
                                </div>
                                <!-- End id="checkout-progress" -->
                                
                                <!-- Checkout content -->
                                <div id="checkout-content">
                                    <div class="box-header">
                                        <h3>Billing address</h3>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h5>
                                    </div>

                                    <div class="box-content">
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <div class="control-group">
                                                    <label for="first_name" class="control-label">First name</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="<?php echo $custom->ifExist($user->first_name); ?>" name="first_name" id="first_name" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="last_name" class="control-label">Last name</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="<?php echo $custom->ifExist($user->last_name); ?>" name="last_name" id="last_name" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="email" class="control-label">Email</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="<?php echo $custom->ifExist($user->email); ?>" name="email" id="email" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="phone" class="control-label">Phone</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="<?php echo $custom->ifExist($user->address->phone); ?>" name="phone" id="phone" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="span6">
                                                <div class="control-group">
                                                    <label for="company" class="control-label">Company</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="<?php echo $custom->ifExist($user->address->company); ?>" name="company" id="company" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="street_address" class="control-label">Street address</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="<?php echo $custom->ifExist($user->address->address); ?>" name="street_address" id="street_address" />
                                                    </div>
                                                </div>

                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label for="city" class="control-label">Town / City</label>
                                                            <div class="controls">
                                                                <input class="span12" type="text" value="<?php echo $custom->ifExist($user->address->city); ?>" name="city" id="city" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label for="zip" class="control-label">Zip / Postcode</label>
                                                            <div class="controls">
                                                                <input class="span12" type="text" value="<?php echo $custom->ifExist($user->address->zip); ?>" name="zip" id="zip" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row-fluid">
                                                    <div class="span12">
                                                        <div class="control-group">
                                                            <label for="country" class="control-label">Country</label>
                                                            <div class="controls">
                                                                {{ Form::select('country', $countries , $custom->ifExist($user->address->country) , array('class' => 'span12') ) }}
                                                            </div>
                                                        </div>
                                                    </div> 
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
							            <li>Subtotal: <strong>£247.98</strong></li>
							            <li>Shipping: <strong>£0.00</strong></li>
							            <li>Tax: <strong>£0.00</strong></li>
							            <li class="important">Total: <strong>£247.98</strong></li>
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