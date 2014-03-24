<?php namespace Shop;

use Illuminate\Support\ServiceProvider;

use User as U;

class ShopServiceProvider extends ServiceProvider {

    public function register()
    {     
    	$this->registerCartService();   
    	$this->registerUserService();			
    }
        
    protected function registerCartService(){
    
	    $this->app->bind('Shop\Repo\Cart\CartInterface', function()
        {
            return new \Shop\Repo\Cart\CartWorker();
        });       
    }   
    
    protected function registerUserService(){
    
	    $this->app->bind('Shop\Repo\User\UserInterface', function()
        {
            return new \Shop\Repo\User\UserEloquent( new U );
        });       
    }    
    
}