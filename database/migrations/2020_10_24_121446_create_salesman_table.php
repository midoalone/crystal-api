<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesmanTable extends Migration {

	public function up()
	{
		Schema::create('salesman', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
			$table->string('phone')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('salesman');
	}
}