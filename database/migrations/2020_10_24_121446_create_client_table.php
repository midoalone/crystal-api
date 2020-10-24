<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientTable extends Migration {

	public function up()
	{
		Schema::create('client', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('mobile')->nullable();
			$table->string('email')->nullable();
			$table->string('password')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('client');
	}
}