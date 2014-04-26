<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			
			$table->integer('subtotal');
			$table->integer('total');
			$table->string('invoice_number');
			$table->integer('coupon_id');
			$table->integer('user_id');
			$table->integer('shipping_id');
			$table->integer('cart_id');
			$table->enum('status', array('waiting','paid','error','cancelled'))->default('waiting');
			$table->dateTime('deleted_at');
			
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
		Schema::drop('orders');
	}

}
