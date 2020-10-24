<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryTable extends Migration {

	public function up()
	{
		Schema::create('category', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name_en')->nullable();
			$table->string('name_ar')->nullable();
			$table->text('description_en')->nullable();
			$table->text('description_ar')->nullable();
			$table->integer('parent_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('category');
	}
}