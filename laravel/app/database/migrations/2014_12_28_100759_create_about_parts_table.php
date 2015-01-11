<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutPartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::create('about_parts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('order_no');
			$table->string('title',40);
			$table->string('content', 4096);
			$table->string('image',256)->nullable();
			$table->boolean('deleted')->default(false);
			$table->integer('language_id')->unsigned();
			$table->unique(array('title','language_id'),'title_lang');
			$table->timestamps();
		});
		Schema::table('about_parts', function($table) {
			$table->foreign('language_id')->references('id')->on('languages');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('about_parts');
	}
}
