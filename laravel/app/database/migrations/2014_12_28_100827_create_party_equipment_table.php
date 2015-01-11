<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartyEquipmentTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('party_equipments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title',40);
			$table->string('content', 4096);
			$table->string('image',256)->nullable();
			$table->integer('language_id')->unsigned();
			$table->unique(array('title','language_id'),'title_lang');
			$table->timestamps();
		});
	
		Schema::table('party_equipments', function($table) {
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
		Schema::drop('party_equipments');
	}
}
