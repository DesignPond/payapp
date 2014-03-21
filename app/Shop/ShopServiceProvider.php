<?php namespace Shop;

use Illuminate\Support\ServiceProvider;

class ShopServiceProvider extends ServiceProvider {

    public function register()
    {     
    	$this->registerCartService();   			
    }
        
    protected function registerCartService(){
    
	    $this->app->bind('Shop\Repo\Cart\CartInterface', function()
        {
            return new \Shop\Repo\Cart\CartWorker();
        });       
    }    
    
}