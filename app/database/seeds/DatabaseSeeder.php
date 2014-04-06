<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('AddressTableSeeder');
		$this->call('ShippingsTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('CouponsTableSeeder');
	}

}