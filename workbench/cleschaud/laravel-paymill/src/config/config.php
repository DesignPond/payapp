<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Settings Paymill www.paymill.com
    |--------------------------------------------------------------------------
    |
    | API end point
    | API keys test and live
    |
    */
    
    'api_endpoint' => 'https://api.paymill.com/v2/',
    
    'test_mode'   => TRUE,
   
    'api_test' => array(
    
		'key_private' => '6a5d3309d4ab41dbfb8c96c14bf49755',
		
		'key_public'  => '39700290708f0628c488c250a2c1ee6e' 
		     
    ),
    
    'api_live' => array(
    
		'key_private' => '',
		
		'key_public'  => '' 
		     
    )
    
);
