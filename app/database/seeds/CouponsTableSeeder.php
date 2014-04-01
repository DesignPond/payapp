<?php

class CouponsTableSeeder extends Seeder {

	public function run()
	{

	  DB::table('coupons')->truncate();

	  $users = array(	  
	  	  array( 'name'  => '2014', 'value' => 0.2 ),
	  	  array( 'name'  => 'ISVALID', 'value' => 0.1 ),
	  	  array( 'name'  => 'promo', 'value' => 0.5 )          
      );
 
      DB::table('coupons')->insert($users);

	}

}