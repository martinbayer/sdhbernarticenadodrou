<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title',256);
			$table->dateTime('from_datetime');
			$table->boolean('show_from_time')->default(false);
			$table->dateTime('to_datetime')->nullable();
			$table->boolean('show_to_time')->default(false);
			$table->string('shortcut',255);
			$table->string('html_description', 8192);
			$table->string('image',256)->nullable();
			$table->integer('language_id')->unsigned();
			$table->unique(array('shortcut','language_id'),'shortcut_language');
			$table->timestamps();
		});

		Schema::table('events', function(Blueprint $table) {
			$table->foreign('language_id','lang_id_fk')->references('id')->on('languages');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
