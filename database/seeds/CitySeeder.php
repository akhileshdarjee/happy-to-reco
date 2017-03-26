<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$cities = array(
			['name' => 'Kalyan', 'status' => 'Active', 'slug' => 'kalyan', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")],
			['name' => 'Dombivli', 'status' => 'Active', 'slug' => 'dombivli', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")],
			['name' => 'Ulhasnagar', 'status' => 'Active', 'slug' => 'ulhasnagar', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")],
			['name' => 'Ambernath', 'status' => 'Active', 'slug' => 'ambernath', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")],
			['name' => 'Badlapur', 'status' => 'Active', 'slug' => 'badlapur', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")],
			['name' => 'Thane', 'status' => 'Active', 'slug' => 'thane', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")],
			['name' => 'Ghatkopar', 'status' => 'Active', 'slug' => 'ghatkopar', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")],
			['name' => 'Dadar', 'status' => 'Active', 'slug' => 'dadar', 'owner' => 'admin', 'last_updated_by' => 'admin', 'created_at' => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i:s")]
		);

		DB::table('tabCity')->insert($cities);
	}
}