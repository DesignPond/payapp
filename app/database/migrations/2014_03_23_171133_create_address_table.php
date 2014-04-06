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
			$table->enum('title', array('Mr','Mrs','Ms'));
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email')->nullable();
			$table->string('company')->nullable();
			$table->string('phone')->nullable();
			$table->text('address');
			$table->string('zip');
			$table->string('city');
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
