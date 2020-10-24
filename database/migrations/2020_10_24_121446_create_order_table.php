<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderTable extends Migration {

	public function up()
	{
		Schema::create('order', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('salesman_id')->nullable();
			$table->integer('client_id')->nullable();
			$table->integer('event_id')->nullable();
			$table->integer('attendees_number')->nullable();
			$table->enum('attendees_type', array('men', 'women', 'family'))->nullable();
			$table->datetime('date')->nullable();
			$table->string('from')->nullable();
			$table->string('to')->nullable();
			$table->integer('address_id')->nullable();
			$table->double('subtotal')->nullable();
			$table->integer('vat')->nullable()->default('0');
			$table->double('total')->nullable()->default('0');
			$table->double('paid')->nullable()->default('0');
			$table->double('due')->nullable()->default('0');
			$table->string('status')->nullable();
			$table->integer('user_id')->nullable();
			$table->double('refund_amount')->nullable()->default('0');
			$table->double('down_payment')->nullable()->default('0');
		});
	}

	public function down()
	{
		Schema::drop('order');
	}
}