<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('UserSeeder');
		$this->call('ReportSeeder');
		$this->call('SettingsSeeder');
		$this->call('ServiceSeeder');
		$this->call('CitySeeder');

		// $this->call(UserTableSeeder::class);
	}
}