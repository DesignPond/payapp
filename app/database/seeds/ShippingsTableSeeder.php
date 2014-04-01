<?php

class ShippingsTableSeeder extends Seeder {

	public function run()
	{
	  DB::table('shippings')->truncate();

	  $users = array(	  
	  	  array( 'name' => 'PostPac Priority' ,'description' => 'Delivered to your letterbox within 1 working day' , 'price' => '9' ),
		  array( 'name' => 'MiniPac International Priority' ,'description' => 'Delivered to your letterbox within 10 working day' , 'price' => '50' )       
      );
 
      DB::table('shippings')->insert($users);
	}

}