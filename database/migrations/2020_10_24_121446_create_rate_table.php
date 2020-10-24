<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRateTable extends Migration {

	public function up()
	{
		Schema::create('rate', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('order_id')->nullable();
			$table->integer('question1')->nullable()->default('0');
			$table->integer('question2')->nullable()->default('0');
			$table->integer('question3')->nullable()->default('0');
			$table->integer('question4')->nullable()->default('0');
			$table->integer('question5')->nullable()->default('0');
			$table->string('review')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('rate');
	}
}