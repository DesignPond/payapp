@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	               
	<!-- Cart container -->
    <section class="cart">

        <div class="container">
            <div class="row">

                <div class="span9">
                
                    <!-- Cart -->
                    <div class="box">
                        {{ Form::open(array('url' => 'cart/update', 'method' => 'put')) }}   
                            <div class="box-header">
                                <h3>Shopping cart</h3>
                                <h5>You currently have <strong><?php echo ( !empty($cartTotalCount) ? $cartTotalCount : 0 ); ?></strong> item(s) in your cart</h5>
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
                                    <a href="<?php echo url('/'); ?>" class="btn btn-small">
                                        <i class="icon-chevron-left"></i> &nbsp; Continue shopping
                                    </a>			
                                </div>

                                <div class="pull-right">
                                    <button type="submit" class="btn btn-small mm20">
                                        <i class="icon-undo"></i> &nbsp; Update cart
                                    </button>

                                    <button type="submit" name="checkout" value="1" class="btn btn-primary btn-small mm20">
                                        Proceed to checkout &nbsp; <i class="icon-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        {{ Form::close() }}		
                    </div>
                    <!-- End Cart -->

                    <!-- Shipping estimator -->
                    <div class="box">
                        <form enctype="multipart/form-data" action="#" method="post" onsubmit="return false;">

                            <div class="box-header">
                                <h3>Shipping estimator</h3>
                                <h5>Get an estimated shipping cost for your order</h5>
                            </div>

                            <div class="box-content">
                                <div class="row-fluid">

                                    <div class="span4">
                                        <label for="country">Country</label>
                                        <select class="span12" id="country" name="country">
                                            <option value="3" >Australia</option>
                                            <option value="2" >Canada</option>
                                            <option value="17" selected="selected">United Kingdom</option>
                                            <option value="1" >United States</option>
                                        </select>
                                    </div>

                                    <div class="span4">
                                        <label for="state">State</label>
                                        <div id="shipping_states">
                                            <select class="span12" id="state" name="state">
                                                
                                            </select>				
                                        </div>
                                    </div>

                                    <div class="span4">
                                        <label>ZIP</label>
                                        <input class="span12 zip" type="text" name="zip" value=""/>
                                    </div>

                                </div>
                            </div>

                            <div class="box-footer">
                                <a class="btn btn-small" href="#" onclick="$('#shipping').modal('show');return false;">Estimate shipping cost</a>
                            </div>
                        </form>
                    </div>                                
                    <!-- End Shipping estimator -->

                    <!-- Shipping modal -->
                    <div id="shipping" class="modal hide fade" tabindex="-1">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div class="hgroup title">
                                <h3>Shipping estimator</h3>
                                <h5>Get an estimated shipping cost for your order</h5>
                            </div>
                        </div>

                        <div class="modal-body">
                            <div id="shipping_options">
                                <table class="table table-striped table-bordered">                                         
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                    </tr>
                                    <tr>
                                        <td>Free shipping</td>
                                        <td>Delivered to your letterbox within 7-14 working days</td>
                                        <td>£0.00</td>
                                    </tr>
                                    <tr>
                                        <td>Standard</td>
                                        <td>Delivered to your letterbox within 5 working days</td>
                                        <td>£4.95</td>
                                    </tr>
                                    <tr>
                                        <td>Speedy</td>
                                        <td>Delivered to your letterbox within 3 working days</td>
                                        <td>£8.95</td>
                                    </tr>                                                
                                </table>
                                
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="pull-right">
                                <a href="checkout.html" class="btn btn-primary btn-small">
                                    Proceed to checkout &nbsp; <i class="icon-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>		
                    <!-- End Shipping modal -->
                    
                </div>

                <div class="span3">
                    
                    <!-- Cart details -->
                    <div class="cart-details">
                        <div class="box">
                            <div class="hgroup title">
                                <h3>Order totals</h3>
                                <h5>Shipping costs and taxes will be evaluated during checkout</h5>
                            </div>

                            <ul class="price-list">
                                <li>Subtotal: <strong>£247.98</strong></li>
                                <li class="important">Total: <strong>£247.98</strong></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End class="cart-details" -->
                    
                    <!-- Coupon -->
                    <div class="coupon">
                        <div class="box">
                            <div class="hgroup title">
                                <h3>Coupon code</h3>
                                <h5>Enter your coupon here to redeem</h5>
                            </div>

                            <form enctype="multipart/form-data" action="#" method="post" onsubmit="return false;">
                                
                                <label for="coupon_code">Coupon code</label>
                                <div class="input-append">
                                    <input id="coupon_code" value="" type="text" name="coupon" />

                                    <button type="submit" class="btn" value="Apply" name="set_coupon_code" >
                                        <i class="icon-ok"></i>
                                    </button>
                                </div>

                            </form>				
                        </div>
                    </div>
                    <!-- End class="coupon" -->
                    
                </div>

            </div>
        </div>	
    </section>         
    <!-- End Cart container -->


    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop