<?php namespace Shop;

use Illuminate\Support\ServiceProvider;

use User as U;
use Coupon as C;
use Shipping as S;

class ShopServiceProvider extends ServiceProvider {

    public function register()
    {     
    	$this->registerCartService();   
    	$this->registerUserService();
    	$this->registerCouponService();	
    	$this->registerShippingService();			
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
    
    protected function registerCouponService(){
    
	    $this->app->bind('Shop\Repo\Coupon\CouponInterface', function()
        {
            return new \Shop\Repo\Coupon\CouponEloquent( new C );
        });       
    } 
    
    protected function registerShippingService(){
    
	    $this->app->bind('Shop\Repo\Shipping\ShippingInterface', function()
        {
            return new \Shop\Repo\Shipping\ShippingEloquent( new S );
        });       
    }         
}