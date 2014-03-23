$(document).ready(function() {
	
	$(".payment-errors").hide();
	
	function PaymillResponseHandler(error, result) {
	
		if (error) {
			// Displays the error above the form
			$(".payment-errors").show();
			$(".payment-errors").text(error.apierror);
		}
		else 
		{
			$(".payment-errors").text("");
			
			var form = $("#payment-form");
			// Token
			var token = result.token;
		
			// Insert token into form in order to submit to server
			form.append("<input type='hidden' name='paymillToken' value='" + token + "'/>");		
			form.get(0).submit();
		}
		
		$(".submit-button").removeAttr("disabled");
	}
	
	$("#payment-form").submit(function (event){
		
		event.preventDefault();
		
		// Deactivate submit button to avoid further clicks
		$('.submit-button').attr("disabled", "disabled");
	
		if( !paymill.validateCardNumber( $('.card-number').val() ) ) {
			
			$(".payment-errors").show();
			$(".payment-errors").text("Invalid card number");
			$(".submit-button").removeAttr("disabled");
			
			return false;
		}
	
		if( !paymill.validateExpiry( $('.card-expiry-month').val() , $('.card-expiry-year').val() ) ){
			
			$(".payment-errors").show();
			$(".payment-errors").text("Invalid expiration date");
			$(".submit-button").removeAttr("disabled");
			
			return false;
		}
	
		paymill.createToken({
			number:         $('.card-number').val(),
			exp_month:      $('.card-expiry-month').val(),
			exp_year:       $('.card-expiry-year').val(),
			cvc:            $('.card-cvc').val(),
			cardholder:     $('.card-holdername').val(),
			amount_int:     $('.card-amount-int').val(), // Integer e.g. "4900" für 49,00 EUR
			currency:       $('.card-currency').val()    // ISO 4217 z.B. "EUR"
		}, PaymillResponseHandler);
		
		return false;
		
	});
	
	/*
	 * Common functions
	*/	
		 
	$('body').on('click','.deleteAction',function(){
		
		var $this   = $(this);
		var action  = $this.data('action');
		
		var answer = confirm('Voulez-vous vraiment supprimer : '+ action +' ?');
	    if (answer){
			return true;
	    }
	    return false;	
	});
	
	/*
	 * Cart functions
	*/
	
	var base_url = location.protocol + "//" + location.host+"/";
	
	// Add to cart
	$('body').on('click','.addToCart', function(event){		
		// Prevent form submit
		event.preventDefault();		
		// Serialize form data
		var data = $(".productToCart").serialize();			   
		// Post the infos
		$.ajax({
			 type     : 'post',
			 dataType : "json",
			 data     : { data : data },
			 success  : function(result) 
			 {			 	
				// The inscription is deleted, we refresh the inscription div with new infos
				if(result.result == true){ 				
					// When product added to cart show modal
					$('#added').modal('show');				 	 	               
	            }
	            else
	            {  
	                alert('problem');  // Something went wrong alert the debbuging infos
	            }				
			 },
			 url: base_url + 'cart/addToCart'
		});		
	});	
	
	
	function shippingCost(name){
		
		var shipping = name.find(":selected").val();
		
		var table    = $('#shipping_table tr.ship');
		
		table.hide();
		
		table.each(function() {
		
			var id = $( this ).data( "ship" );
			
			if( id == shipping )
			{
				$( this ).show();
			}
		});		
	}
	
	shippingCost( $(this) );
	
	$('body').on('change','#country', function(event){	
	
		shippingCost( $(this) );
		
	});	
	
  
});	
