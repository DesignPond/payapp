<?php namespace Cleschaud\LaravelPaymill\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class LaravelPaymill extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'laramill'; }
 
}