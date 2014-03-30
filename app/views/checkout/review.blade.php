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
	                                        								
	                                            @if( !$cart->isEmpty() )
		                                            @foreach($cart as $item)
		                                            
		                                            <tr>
		                                                <td data-title="Product" class="col_product text-left">
		                                                
		                                                    <div class="image visible-desktop">
		                                                        <a href="product.html"><img src="img/thumbnails/db_file_img_17_60xauto.jpg" alt="<?php echo $item->name; ?>"></a>
		                                                    </div>
		                                                    
		                                                    <h5><a href="product.html"><?php echo $item->name; ?></a></h5>                                                    
	
															@if( !$item->options->isEmpty() )
															<?php $items = $item->options->toArray(); ?>
		                                                    <ul class="options">
		                                                    	@foreach( $items as $type => $option )
		                                                        <li><?php echo $type; ?> : <?php echo $option; ?></li>
		                                                        @endforeach
		                                                    </ul>
		                                                    @endif
		                                                    
		                                                </td>
		                                                <td data-title="Remove" class="col_remove text-right">
		                                                	<a href="<?php echo url('cart/delete/'.$item->rowid); ?>"><i class="icon-trash icon-large"></i></a>
		                                                </td>	
		                                                <td data-title="Qty" class="col_qty text-right">	                                                	
		                                                	<input type="hidden" name="rowid[]" value="<?php echo $item->rowid; ?>" />
		                                                	<input type="text" name="item_quantity[]" value="<?php echo $item->qty; ?>" />                                           	
		                                                </td>
		                                                <td data-title="Single" class="col_single text-right"><span class="single-price">CHF <?php echo $item->price; ?></span></td>	
		                                                <td data-title="Discount" class="col_discount text-right"><span class="discount">CHF 0.00</span></td>	
		                                                <td data-title="Total" class="col_total text-right"><span class="total-price">CHF <?php echo $item->subtotal; ?></span></td>
		                                            </tr>
		                                            
		                                            @endforeach
	                                            @endif

	                                          </tbody>
	                                       </table>
                                        </div>
                                    </div>
 
                                    <div class="box-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo url('checkout/methodShipping'); ?>" class="btn btn-small">
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
                            	@include('checkout.includes.total')							    
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