<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActualityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('actualities', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('order_no');
			$table->string('title',40);
			$table->string('content');
			$table->string('reference',256)->nullable();
			$table->boolean('active')->default(true);
			$table->integer('language_id')->unsigned();
			$table->unique(array('title','language_id'),'title_lang');
			$table->timestamps();
		});

		Schema::table('actualities', function($table) {
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
		Schema::drop('actualities');
	}
}
