<?php

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$services = array(
			['name' => 'Maid', 'status' => 'Active', 'slug' => 'maid', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")],
			['name' => 'Driver', 'status' => 'Active', 'slug' => 'driver', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")],
			['name' => 'Carpenter', 'status' => 'Active', 'slug' => 'carpenter', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")],
			['name' => 'Electrician', 'status' => 'Active', 'slug' => 'electrician', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")],
			['name' => 'Plumber', 'status' => 'Active', 'slug' => 'plumber', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")],
			['name' => 'Baby Sitter', 'status' => 'Active', 'slug' => 'baby-sitter', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")],
			['name' => 'Cook', 'status' => 'Active', 'slug' => 'cook', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")],
			['name' => 'Laundry', 'status' => 'Active', 'slug' => 'laundry', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")]
		);

		DB::table('tabService')->insert($services);
	}
}