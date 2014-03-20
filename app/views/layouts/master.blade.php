<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1">

		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<!-- Page Title -->
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<title>Paymill</title>

		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<!-- CSS -->
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<link href="<?php echo asset('css/bootstrap.css');?>" rel="stylesheet">
		<link href="<?php echo asset('css/bootstrap-responsive.css');?>" rel="stylesheet">
		<link href="<?php echo asset('css/tfingi-megamenu/tfingi-megamenu-frontend.css');?>" rel="stylesheet">
		<link href="<?php echo asset('css/color-schemes/turquoise.css');?>" rel="stylesheet">
		<link href="<?php echo asset('css/fonts/font-awesome.css');?>" rel="stylesheet">
		
		<!--
		<meta http-equiv="X-UA-Compatible" content="IE=7; IE=8" />-->
		<link href="http://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,700,700italic|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<!-- JavaScript -->
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<!-- Main jQuery Files -->
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<!-- General Site Configuration -->
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<script type="text/javascript" src="<?php echo asset('js/jquery-migrate-1.2.1.min.js');?>"></script>
		<!--[if lt IE 9]>
		<script src=""<?php echo asset('js/html5shiv.js');?>"></script>
		<![endif]-->
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo asset('js/jquery-ui-1.10.2.custom.js');?>"></script>
		<script type="text/javascript" src="<?php echo asset('js/jquery.easing-1.3.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo asset('js/bootstrap.js');?>"></script>
		<script type="text/javascript" src="<?php echo asset('js/jquery.isotope.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo asset('js/jquery.flexslider.js');?>"></script>
		<script type="text/javascript" src="<?php echo asset('js/jquery.elevatezoom.js');?>"></script>
		<script type="text/javascript" src="<?php echo asset('js/jquery.sharrre-1.3.4.js');?>"></script>
		<script type="text/javascript" src="<?php echo asset('js/jquery.gmap3.js');?>"></script>
		<script type="text/javascript" src="<?php echo asset('js/imagesloaded.js');?>"></script>
		<script type="text/javascript" src="<?php echo asset('js/la_boutique.js');?>"></script>
		<script type="text/javascript" src="<?php echo asset('js/tfingi-megamenu/tfingi-megamenu-frontend.js');?>"></script>

		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<!-- Main Paymill Script -->
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
					
		<script type="text/javascript">
			var PAYMILL_PUBLIC_KEY = '39700290708f0628c488c250a2c1ee6e';
		</script>
		<script type="text/javascript" src="https://bridge.paymill.com/"></script>
		<script type="text/javascript" src="<?php echo asset('js/paymill.js');?>"></script>
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<!-- END JavaScript -->
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	</head>

	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<!-- Body - Add "contained" to below class for boxed layout -->
	<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	<body>

		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<!-- Main wrapper -->
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<div class="wrapper">
			
			<!-- Start header -->
			<div class="header">
			
				<!-- Top bar -->
			    <div class="top">
			        <div class="container">
			            <div class="row">
			                <div class="span6"></div>
			                <div class="span6 hidden-phone">
			                    <ul class="inline pull-right">
			                        <li><a href="login-register.html" title="Login / Register">Login / Register</a></li>
			                    </ul>
			                </div>
			            </div>
			        </div>
			    </div>
			    <!-- End class="top" -->

			    <!-- Logo & Search bar -->
			    <div class="bottom">
			        <div class="container">
			            <div class="row">
			            
			                <div class="span8">							
			                    <div class="logo"><a href="<?php echo url('/'); ?>" title="&larr; Back home"><img src="<?php echo asset('img/logo.png');?>" alt="La Boutique" /></a></div>
			                </div>
			
			                <div class="span4">
			                    <div class="row-fluid">
			                        <div class="span10">                            
			                            <!-- Search -->
			                            <div class="search">
			                                <div class="qs_s">
			                                    <form method="post" action="search.html">
			                                        <input type="text" name="query" id="query" placeholder="Search&hellip;" autocomplete="off" value="">
			                                    </form>
			                                </div>
			                            </div>
			                            <!-- End class="search"-->                           
			                        </div>
			
			                        <div class="span2">
			                            
			                            <!-- Mini cart -->
			                            <div class="mini-cart">
			                                <a href="<?php echo url('cart'); ?>" title="Go to cart &rarr;">
			                                    <span><?php echo ( !empty($cartTotalCount) ? $cartTotalCount : 0 ); ?></span>			                                    
			                                </a>									
			                            </div>
			                            <!-- End class="mini-cart" -->
			                            
			                        </div>
			                    </div>
			                </div>
			
			            </div>
			        </div>
			    </div>
			    <!-- End class="bottom" -->
    
			</div>
			<!-- End class="header" -->            

			<!-- Navigation -->
			<nav class="navigation">
			    <div class="container">
			     
			        <div class="row">
			            <div class="span9">
			                
							<a href="#" class="main-menu-button">Navigation</a>
							<!-- Begin Menu Container -->
							<div class="megamenu_container">
							    <div class="menu-main-navigation-container">
							    
							        <ul id="menu-main-navigation" class="main-menu">
							            <li><a href="<?php echo url('/'); ?>">Home</a></li>
										<li><a href="<?php echo url('subscriptions'); ?>">Subscriptions</a></li>
										<li><a href="<?php echo url('offers'); ?>">Offers</a></li>
										<li><a href="<?php echo url('clients'); ?>">Clients</a></li>
										<li ><a href="<?php echo url('cart'); ?>">Cart</a></li>
							        </ul>
							        
							    </div>   							     
							</div> 
							   
			            </div>
			
			            <div class="span3 visible-desktop"></div>
			            
			        </div>        
			    
			    </div>
			</nav>
			<!-- End class="navigation" -->


			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<!-- Main Content -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<section class="main">	
				<section class="static_page_1">
					<div class="container">	  
						<div class="row">
			           		<div class="span12">    		      
		      	
						   			@yield('content')
						   			
							</div>
						</div>
					</div>
	              </section>	            
	        </section>
            
	        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<!-- END Main Content -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->


            <!-- Twitter bar -->
			<div class="twitter-bar">			
			    <div class="container">
			        <div class="row">			
			            <div class="span12">			
			            </div>
			        </div>			
			    </div>			
			</div>			
			<!-- End class="twitter-bar" -->  
			          
			<!-- Footer -->
			<div class="footer">
			    <div class="container">
			        <div class="row">	
			                        
			            <div class="span2">
			                <!-- Support -->
			                <div class="support">
			                    <h6>Support</h6>
			
			                    <ul class="links">
			                        <li><a href="about-us.html" title="About us" class="title">About us</a></li>
			                        <li><a href="typography.html" title="Typography" class="title">Typography</a></li>
			                        <li><a href="retina-ready-icons.html" title="Retina-ready icons" class="title">Retina-ready icons</a></li>
			                        <li><a href="contact-us.html" title="Contact us" class="title">Contact us</a></li>											
			                    </ul>
			                </div>
			                <!-- End class="support" -->
			                
			            </div>
			
			            <div class="span2">			                
			                <!-- Categories -->
			                <div class="categories">
			                    <h6>Shop</h6>
			
			                    <ul class="links">
			                        <li><a href="category.html" title="Women">Women</a></li>
			                        <li><a href="category.html" title="Men">Men</a></li>
			                        <li><a href="category.html" title="Girls">Girls</a></li>
			                        <li><a href="category.html" title="Boys">Boys</a></li>
			                    </ul>
			                </div>
			                <!-- End class="categories" -->			
			            </div>
			
			            <div class="span4">			            
			
			                <!-- My account -->
			                <div class="account">
			                    <h6>My account</h6>			
			                    <ul class="links">								
			                        <li>
			                            <a href="login-register.html" title="Login / Register">Login / Register</a>									
			                        </li>
			                    </ul>
			                </div>
			                <!-- End class="account"-->
			                
			            </div>
			
			            <div class="span4"></div>
			            
			        </div>
			    </div>
			</div>
			<!-- End id="footer" -->

            <!-- Credits bar -->
			<div class="credits">
			    <div class="container">
			        <div class="row">
			            <div class="span8">
			                <p>&copy; 2013 <a href="#" title="La Boutique">La Boutique</a> &middot; <a href="#" title="Terms &amp; Conditions">Terms &amp; Conditions</a>  &middot; All Rights Reserved. </p>
			            </div>
			            <div class="span4 text-right hidden-phone">
			                <p><a href="http://themeforest.net/item/la-boutique-responsive-ecommerce-template/5573130?ref=Tfingi" title="Responsive eCommerce template">Responsive eCommerce template by Tfingi</a></p>
			            </div>
			        </div>
			    </div>
			</div>
			<!-- End class="credits" -->                        
			

		</div>
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
		<!-- END Main wrapper -->
		<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

	</body>
</html>