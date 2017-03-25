<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabRecommendation extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tabRecommendation', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('avatar')->nullable();
			$table->string('status', 12)->default('Active');
			$table->string('contact_no');
			$table->text('address')->nullable();
			$table->string('service');
			$table->integer('service_id')->unsigned();
			$table->string('recommended_by');
			$table->text('description')->nullable();
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
		Schema::drop('tabRecommendation');
	}
}