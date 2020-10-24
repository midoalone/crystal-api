<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderProductTable extends Migration {

	public function up()
	{
		Schema::create('order_product', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('order_id')->nullable();
			$table->integer('product_id')->nullable();
			$table->integer('quantity')->nullable()->default('0');
			$table->double('total')->nullable()->default('0');
		});
	}

	public function down()
	{
		Schema::drop('order_product');
	}
}