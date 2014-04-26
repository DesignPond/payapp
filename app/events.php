<?php

/*
|--------------------------------------------------------------------------
| Event Listeners 
|--------------------------------------------------------------------------
*/

Event::listen('order.create', function($order)
{
    Log::info('Process new order and payment:');	
    
});

