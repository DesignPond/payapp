<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{

	  DB::table('users')->truncate();

	  $users = array(
	  
	  	  array(
              'first_name' => 'Cindy',
              'last_name'  => 'Leschaud',
              'email'      => 'cindy.leschaud@gmail.com',
              'password'   =>  Hash::make('secret'),
			  'activated'  => 1,
              'created_at' => date('Y-m-d G:i:s'),
			  'updated_at' => date('Y-m-d G:i:s') 
          ),
          array(
              'first_name' => 'User',
              'last_name'  => 'Username',
              'email'      => 'user@user.com',
              'password'   =>  Hash::make('password'),
			  'activated'  => 1,
              'created_at' => date('Y-m-d G:i:s'),
			  'updated_at' => date('Y-m-d G:i:s') 
          )
          
      );
 
      DB::table('users')->insert($users);

	}

}
