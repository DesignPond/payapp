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
                <form enctype="multipart/form-data" action="#" method="post">
                   
                    <div class="row">
                        <div class="span9">
                            <div class="box">
                                
                                <!-- Checkout progress -->
                                <div id="checkout-progress">
                                    <ul class="nav nav-tabs">
                                        <li><a href="checkout.html"><i class="icon-map-marker icon-large"></i><span>Billing address</span></a></li>
                                        <li><a href="shipping.html"><i class="icon-envelope icon-large"></i><span>Shipping address</span></a></li>
                                        <li><a href="shipping-method.html"><i class="icon-truck icon-large"></i><span>Shipping method</span></a></li>
                                        <li><a href="payment-method.html"><i class="icon-money icon-large"></i><span>Payment method</span></a></li>
                                        <li class="active"><div><i class="icon-search icon-large"></i><span>Order review</span></div></li>
                                    </ul>					
                                </div>
                                <!-- End id="checkout-progress" -->
                                
                                <!-- Checkout content -->
                                <div id="checkout-content">
                                    <div class="box-header">                                                                                                    
                                        <h3>Order review</h3>
                                        <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h5>                                                    
                                    </div>
                                                                        
                                    <div class="box-content">
                                        <div class="cart-items">
                                            <table class="styled-table">
                                                <thead>
                                                    <tr>
                                                        <th class="col_product text-left">Product</th>
                                                        <th class="col_remove text-right">&nbsp;</th>
                                                        <th class="col_qty text-right">Qty</th>
                                                        <th class="col_single text-right">Single</th>
                                                        <th class="col_discount text-right">Discount</th>
                                                        <th class="col_total text-right">Total</th>
                                                    </tr>
                                                </thead>

                                                <tbody>									
                                                    <tr>
                                                        <td class="col_product text-left">
                                                            <div class="image visible-desktop">
                                                                <a href="product.html">
                                                                    <img src="img/thumbnails/db_file_img_230_60xauto.jpg" alt="Helen Romper">
                                                                </a>
                                                            </div>

                                                            <h5>
                                                                <a href="product.html">Helen Romper</a>
                                                            </h5>

                                                        </td>

                                                        <td class="col_remove text-right">
                                                            <a href="#">
                                                                <i class="icon-trash icon-large"></i>
                                                            </a>
                                                        </td>

                                                        <td class="col_qty text-right">
                                                            <span class="quantity">2</span>
                                                        </td>

                                                        <td class="col_single text-right">
                                                            <span class="single-price">£43.99</span>
                                                        </td>

                                                        <td class="col_discount text-right">
                                                            <span class="discount">£0.00</span>
                                                        </td>

                                                        <td class="col_total text-right">
                                                            <span class="total-price">£87.98</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col_product text-left">
                                                            <div class="image visible-desktop">
                                                                <a href="product.html">
                                                                    <img src="img/thumbnails/db_file_img_17_60xauto.jpg" alt="1300 in Grey">
                                                                </a>
                                                            </div>

                                                            <h5>
                                                                <a href="product.html">1300 in Grey</a>
                                                            </h5>

                                                            <ul class="options">
                                                                <li>Size: UK 9</li>
                                                                <li>Color: Gray</li>
                                                            </ul>
                                                        </td>

                                                        <td class="col_remove text-right">
                                                            <a href="#">
                                                                <i class="icon-trash icon-large"></i>
                                                            </a>
                                                        </td>

                                                        <td class="col_qty text-right">                                                                    
                                                            <span class="quantity">1</span>
                                                        </td>

                                                        <td class="col_single text-right">
                                                            <span class="single-price">£160.00</span>
                                                        </td>

                                                        <td class="col_discount text-right">
                                                            <span class="discount">£0.00</span>
                                                        </td>

                                                        <td class="col_total text-right">
                                                            <span class="total-price">£160.00</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
 
                                    <div class="box-footer">
                                        <div class="pull-left">
                                            <a href="payment-method.html" class="btn btn-small">
                                                <i class="icon-chevron-left"></i> &nbsp; Payment method
                                            </a>
                                        </div>

                                        <div class="pull-right">                                                    
                                            <button type="submit" class="btn btn-primary">
                                                Create order and pay &nbsp; <i class="icon-ok"></i>
                                            </button>
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