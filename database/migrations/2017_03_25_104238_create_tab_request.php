<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabRequest extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tabRequest', function (Blueprint $table) {
			$table->increments('id');
			$table->string('service');
			$table->integer('service_id')->unsigned();
			$table->string('requested_by');
			$table->integer('user_id')->unsigned();
			$table->string('city');
			$table->string('status', 12)->default('Active');
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
		Schema::drop('tabRequest');
	}
}