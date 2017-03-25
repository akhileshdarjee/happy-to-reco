<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabFriends extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tabFriends', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->integer('friend_id')->unsigned();
			$table->string('status', 12)->default('Active');
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
		Schema::drop('tabFriends');
	}
}