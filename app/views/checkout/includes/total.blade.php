<!-- Order totals -->
<div id="checkout-totals">
    <div class="hgroup title">
        <h3>Order total</h3>
        <h5>Shipping costs and taxes will be calculated during checkout</h5>
    </div>
	<ul class="price-list">
        <li>Subtotal: <strong>CHF <?php echo ( !empty($cartSubTotal) ? $cartSubTotal : 0 ); ?></strong></li>
        
	    @if(Session::has('coupon'))
		<li>
			Coupon <?php echo $namecoupon; ?> <strong> -<?php echo $valuecoupon; ?>%</strong>															
				
		</li>
		@endif
		
        <li>Shipping: <strong><?php echo ( !empty($shippingPrice) ? $shippingPrice : 0 ); ?></strong></li>
        <li class="important">Total: <strong>CHF <?php echo ( !empty($cartTotal) ? $cartTotal : 0 ); ?></strong></li>
    </ul>
</div>
<!-- End id="checkout-totals" -->

