<?php namespace Shop;

use Illuminate\Support\ServiceProvider;

use User as U;
use Product as P;
use Order as O;
use Order_articles as A;
use Shipping as S;
use Coupon as C;
use DBCart as DBCart;

class ShopServiceProvider extends ServiceProvider {

    public function register()
    {     
    	$this->registerCartService();   
    	$this->registerUserService();
    	$this->registerProductService();	
    	$this->registerOrderService();	
    	$this->registerCouponService();	
    	$this->registerShippingService();			
    }
        
    protected function registerCartService(){
    
	    $this->app->bind('Shop\Repo\Cart\CartInterface', function()
        {
            return new \Shop\Repo\Cart\CartWorker( new DBCart);
        });       
    }   
    
    protected function registerUserService(){
    
	    $this->app->bind('Shop\Repo\User\UserInterface', function()
        {
            return new \Shop\Repo\User\UserEloquent( new U );
        });       
    }    

    protected function registerProductService(){
    
	    $this->app->bind('Shop\Repo\Product\ProductInterface', function()
        {
            return new \Shop\Repo\Product\ProductEloquent( new P );
        });       
    }
       
    protected function registerOrderService(){
    
	    $this->app->bind('Shop\Repo\Order\OrderInterface', function()
        {
            return new \Shop\Repo\Order\OrderEloquent( new O , new A );
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