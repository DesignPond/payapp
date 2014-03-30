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
               {{ Form::open(array('url' => 'checkout/methodShipping', 'method' => 'post')) }} 

                    <div class="row">
                        <div class="span9">
                            <div class="box">
                            
                            <?php  if (Session::has('user.shipping')) { $shipping = Session::get('user.shipping'); }  ?>
                                
                                <!-- Checkout progress -->
                                <div id="checkout-progress">
                                    <ul class="nav nav-tabs">
                                        <li>
                                            <a href="<?php echo url('checkout/billing'); ?>">
                                                <i class="icon-map-marker icon-large"></i>
                                                <span>Billing address</span>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="<?php echo url('checkout/shipping'); ?>">
                                                <i class="icon-envelope icon-large"></i>
                                                <span>Shipping address</span>
                                            </a>
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
                                        <div class="row-fluid">
                                            <div class="span8">
                                                <h3>Shipping address</h3>
                                                <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h5>
                                            </div>
                                            <div class="span4">
                                                <a href="<?php echo url('checkout/copyBilling'); ?>" class="btn btn-secondary btn-mini pull-right"><i class="icon-copy"></i> &nbsp; Copy billing address</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-content">
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <div class="control-group">
                                                    <label for="first_name" class="control-label">First name</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="<?php echo $custom->ifExist($shipping[0]['first_name']); ?>" name="first_name" id="first_name" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="last_name" class="control-label">Last name</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="<?php echo $custom->ifExist($shipping[0]['last_name']); ?>" name="last_name" id="last_name" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="email" class="control-label">Email</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="<?php echo $custom->ifExist($shipping[0]['email']); ?>" name="email" id="email" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="phone" class="control-label">Phone</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="<?php echo $custom->ifExist($shipping[0]['phone']); ?>" name="phone" id="phone" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="span6">
                                                <div class="control-group">
                                                    <label for="company" class="control-label">Company</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="<?php echo $custom->ifExist($shipping[0]['company']); ?>" name="company" id="company" />
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="street_address" class="control-label">Street address</label>
                                                    <div class="controls">
                                                        <input class="span12" type="text" value="<?php echo $custom->ifExist($shipping[0]['street_address']); ?>" name="street_address" id="street_address" />
                                                    </div>
                                                </div>

                                                <div class="row-fluid">
                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label for="city" class="control-label">Town / City</label>
                                                            <div class="controls">
                                                                <input class="span12" type="text" value="<?php echo $custom->ifExist($shipping[0]['city']); ?>" name="city" id="city" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="span6">
                                                        <div class="control-group">
                                                            <label for="zip" class="control-label">Zip / Postcode</label>
                                                            <div class="controls">
                                                                <input class="span12" type="text" value="<?php echo $custom->ifExist($shipping[0]['zip']); ?>" name="zip" id="zip" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row-fluid">
                                                    <div class="span12">
                                                        <div class="control-group">
                                                            <label for="country" class="control-label">Country</label>
                                                            <div class="controls">
                                                                {{ Form::select('country', $countries ,  $custom->ifExist($shipping[0]['country']) , array('class' => 'span12') ) }}
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                                
                                            </div>
                                        </div>	
                                    </div>

                                    <div class="box-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo url('checkout/billing'); ?>" class="btn btn-small"><i class="icon-chevron-left"></i> &nbsp; Billing address</a>
                                        </div>

                                        <div class="pull-right">                                                    
                                            <button type="submit" class="btn btn-primary">Shipping method &nbsp; <i class="icon-chevron-right"></i></button>                                           
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