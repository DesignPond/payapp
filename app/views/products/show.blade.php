@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	               
     <!-- Product content -->
     <section class="product">

        <!-- Product info -->
        <section class="product-info">
            <div class="container">
                <div class="row">

                    <div class="span4">
                        <div class="product-images">
                            <div class="box">
                                <div class="primary">
                                    <img src="<?php echo asset('images/shop/'.$product['image']); ?>" data-zoom-image="<?php echo asset('images/shop/'.$product['image']); ?>" alt="<?php echo $product['title']; ?>" />
                                </div>                                
                    			<div class="thumbs" id="gallery"></div>
                                <div class="social"></div>
                            </div>
                        </div>
                    </div>

                    <div class="span8">
                        
                        <!-- Product content -->
                        <div class="product-content">
                            <div class="box">

                                <!-- Tab panels' navigation -->
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#product" data-toggle="tab">
                                            <i class="icon-reorder icon-large"></i>
                                            <span class="hidden-phone">Product</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#description" data-toggle="tab">
                                            <i class="icon-info-sign icon-large"></i>
                                            <span class="hidden-phone">Info</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#shipping" data-toggle="tab">
                                            <i class="icon-truck icon-large"></i>
                                            <span class="hidden-phone">Shipping</span>
                                        </a>
                                    </li>

                                </ul>
                                <!-- End Tab panels' navigation -->

                                <!-- Tab panels container -->                                
                                <div class="tab-content">
                                    
                                    <!-- Product tab -->
                                    <div class="tab-pane active" id="product">
                                    
                                        {{ Form::open(array('url' => 'cart', 'method' => 'post' , 'class' => 'productToCart' )) }}
                                            
                                            <div class="details">
                                                <h1><?php echo $product['title']; ?></h1>
                                                <div class="prices"><span class="price">CHF <?php echo $product['price']; ?></span></div>
                                                <div class="meta">
                                                    <div class="sku">
                                                        <i class="icon-pencil"></i><span rel="tooltip" title="SKU is 0092">0092</span>
                                                    </div>
                                                    <div class="categories">
                                                        <span><i class="icon-tags"></i><a href="category.html" title="Dresses">Game</a></span>, <a href="category.html" title="Womens">Fantasy</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="short-description">
                                                <p>Lorem ipsum dolor sit amet</p>                                              
                                            </div>
                                            
                                            <div class="options">
                                                <div class="row-fluid">
                                                    <div class="span6">
                                                    
                                                        <div class="control-group">
                                                            <label for="product_options" class="control-label">Console</label>
                                                            <div class="controls">
                                                                <select id="product_options" name="options[console]" class="span12">
                                                                    <option value="Xbox">Xbox</option>
                                                                    <option value="Playstation 3" selected="selected">Playstation 3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label for="product_options" class="control-label">Color</label>
                                                            <div class="controls">
                                                                <select id="product_options" name="options[color]" class="span12">
                                                                    <option value="Brown">Brown</option>
                                                                    <option value="Black" selected="selected">Black</option>
                                                                </select>
                                                            </div>
                                                        </div>                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="add-to-cart">  
                                            	<input type="hidden"  name="id" value="<?php echo $product['id']; ?>" /> 
                                            	<input type="hidden"  name="name" value="<?php echo $product['title']; ?>" /> 
                                            	<input type="hidden"  name="qty" value="1" /> 
                                            	<input type="hidden"  name="price" value="<?php echo $product['price']; ?>" />                                        	
                                                <button class="btn btn-primary btn-large addToCart">
                                                    <i class="icon-plus"></i> &nbsp; Add to cart
                                                </button>                                               
                                            </div>
                                            
                                        {{ Form::close() }}	
                                        				
                                    </div>
                                    <!-- End id="product" -->
                                    
                                    <!-- Description tab -->
                                    <div class="tab-pane" id="description">
                                        <p><span>Vintage-style faux leather short overalls. Long adjustable straps with brass detailing, exposed zip at back, and side slant 
                                        pockets with single rear welt pocket.</span><br /><br />
                                            <span>100% Polyester</span>
                                        </p>						
                                    </div>
                                    <!-- End id="description" -->
                                    
                                     <!-- Shipping tab -->
                                    <div class="tab-pane" id="shipping">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                                        <p><img class="img-polaroid" src="http://www.tfingi.com/repo/royal-mail.png" alt="" /><img class="img-polaroid" src="http://www.tfingi.com/repo/ups-logo.png" alt="" /></p>
                                        <p>Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                        <h6><em class="icon-gift"></em> Giftwrap?</h6>
                                        <p>Let us take care of giftwrapping your presents by selecting <strong>Giftwrap</strong> in the order process. Eligible items 
                                        can be giftwrapped for as little as &pound;0.99, and larger items may be presented in gift bags.</p>						
                                    </div>
                                    <!-- End id="shipping" -->                                                                   
                                    
                                </div>                                            
                                <!-- End tab panels container -->
                                
                            </div>
                            
		                     <!-- Added to cart modal window -->
		                    <div id="added" class="modal hide fade" tabindex="-1">
		                        <div class="modal-header">
		                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		                            <div class="hgroup title">
		                                <h5>"<?php echo $product['title']; ?>" has been added to your cart</h5>
		                            </div>
		                        </div>
		                        <div class="modal-footer">	
		                            <div class="pull-right">				
		                                <a href="<?php echo url('cart'); ?>" class="btn btn-primary btn-small">
		                                    Go to cart &nbsp; <i class="icon-chevron-right"></i>
		                                </a>
		                            </div>
		                        </div>
		                    </div>
		                    <!-- End id="added" -->
                            
                        </div>                                    
                        <!-- End class="product-content" -->
                        
                        
                    </div>

                </div>
            </div>
        </section>
        <!-- End class="product-info" -->

	</section>

	
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop