<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('address', function(Blueprint $table)
		{
		
			$table->increments('id');
			$table->integer('title');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->string('company');
			$table->string('phone');
			$table->text('address');
			$table->string('zip');
			$table->string('city');
			$table->integer('state');
			$table->integer('country');
			$table->integer('user_id');
			$table->boolean('deleted');
			$table->timestamps();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('address');
	}

}
