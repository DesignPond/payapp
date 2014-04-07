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
			
			$table->float('subtotal');
			$table->float('total');
			$table->string('invoice_number');
			$table->integer('coupon_id');
			$table->integer('user_id');
			$table->integer('shipping_id');
			$table->integer('cart_id');
			$table->enum('status', array('waiting','paid','error','cancelled'))->default('waiting');
			$table->boolean('deleted')->default(false);
			
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
