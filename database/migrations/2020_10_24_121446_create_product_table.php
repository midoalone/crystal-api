<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTable extends Migration {

	public function up()
	{
		Schema::create('product', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name_en')->nullable();
			$table->string('name_ar')->nullable();
			$table->text('description_en')->nullable();
			$table->text('description_ar')->nullable();
			$table->double('price')->nullable()->default('0');
			$table->enum('unit', array('person', 'quantity'))->nullable();
			$table->integer('category_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('product');
	}
}