<?php

class AddressTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('address')->truncate();

		$address = array(
	        array(
	           'title'      => 'Ms',
	           'first_name' => 'Cindy',
	           'last_name'  => 'Leschaud',
	           'email'      => 'cindy.leschaud@gmail.com',
	           'company'    => 'Unine',
	           'phone'      => '078 690 00 23',
	           'address'    => 'Ruelle de l\'hôtel de ville 3',
	           'zip'        => '2520',
	           'city'       => 'La Neuveville',
	           'country'    => '205',
	           'user_id'    => '1',
	           'type'       => 'billing',	  	                     
	           'deleted'    => '0',
	           'created_at' => date('Y-m-d G:i:s'),
			   'updated_at' => date('Y-m-d G:i:s')        
	        ),
	        array(
	           'title'      => 'Ms',
	           'first_name' => 'Cindy',
	           'last_name'  => 'Leschaud',
	           'email'      => 'pruntrut@yahoo.fr',
	           'company'    => 'Faculté de droit',
	           'phone'      => '032 718 12 31',
	           'address'    => 'Breguet 1',
	           'zip'        => '2000',
	           'city'       => 'Neuchâtel',
	           'country'    => '205',
	           'user_id'    => '1',	 
	           'type'       => 'shipping',	                     
	           'deleted'    => '0',
	           'created_at' => date('Y-m-d G:i:s'),
			   'updated_at' => date('Y-m-d G:i:s')        
	        )
		);

		// Uncomment the below to run the seeder
		DB::table('address')->insert($address);
	}

}