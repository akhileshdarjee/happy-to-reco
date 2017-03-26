<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabRecoCities extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tabRecoCities', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('recommendation_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->string('owner');
			$table->string('last_updated_by');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tabRecoCities');
	}
}