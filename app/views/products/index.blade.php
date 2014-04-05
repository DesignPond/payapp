@extends('layouts.master')

@section('content')

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	               
    <section class="category">

        <div class="container">
             <div class="row">

                 <div class="span3">
                        
                      <!-- Sidebar -->
                      <aside class="sidebar">

                            <div class="children">
                                <div class="box border-top">

                                    <div class="hgroup title"><h3><a href="category.html" title="Womens">Womens</a></h3></div>

                                    <ul class="category-list secondary">
                                        <li><a href="category.html" title="Shoes"><span class="count">3</span>Shoes</a></li>
                                        <li class="current"><a href="category.html" title="Dresses"><span class="count">11</span>Dresses</a></li>
                                        <li><a href="category.html" title="Bags"><span class="count">2</span>Bags</a></li>
                                        <li><a href="category.html" title="Trousers"><span class="count">7</span>Trousers</a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>

                            <!-- Price filter -->
                            <div class="price-filter">
                                <div class="box border-top">
                                    <div class="hgroup title">
                                        <h3>Refine products</h3>
                                        <h5>Filter your products by price</h5>
                                    </div>

                                    <div id="slider" data-max="200" data-step="5" data-currency="&pound;"> </div>
                                    <span id="slider-label">Price range: <strong>£0 &ndash; £200</strong></span>
                                </div>
                            </div>
                            <!-- End class="price-filter" -->

                                    
				 </aside>
	             <!-- End sidebar -->
                                
			</div>
                          
			<div class="span9">

				@if(!empty($products))
				<!-- Products list -->
				<ul class="product-list isotope">
					
					@foreach($products as $product)
					
				    <li class="standard" data-price="<?php echo $product['price']; ?>">
				        <a href="<?php echo url('products/'.$product['id']); ?>" title="<?php echo $product['title']; ?>">
				            <div class="image">
				                <img class="primary" src="<?php echo asset('images/shop/'.$product['image']); ?>" alt="<?php echo $product['image']; ?>" />
				            </div>
				
				            <div class="title">
				                <div class="prices">
				                    <span class="price">CHF <?php echo $product['price']; ?></span>
				                </div>
				                <h3><?php echo $product['title']; ?></h3>
				            </div>
				
				        </a>
				    </li>
				    
					@endforeach
					
				</ul>
				<!-- End class="product-list isotope" -->  
				@endif              
	
	       </div>
                            
		</div>
	</div>

	</section>

	
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- END Main Content -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			
@stop