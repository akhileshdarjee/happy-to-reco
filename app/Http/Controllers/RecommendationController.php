<?php

namespace HappyToReco\Http\Controllers;

use Illuminate\Http\Request;

use HappyToReco\Http\Requests;
use HappyToReco\Http\Controllers\Controller;

class RecommendationController extends Controller
{
	// define common variables
	public $form_config;

	public function __construct() {
		$this->form_config = [
			'module' => 'Recommendation',
			'module_label' => 'Recommendation',
			'module_icon' => 'fa fa-gift',
			'table_name' => 'tabRecommendation',
			'view' => 'layouts.recommendation',
			'avatar_folder' => '/images/recommendation',
			'link_field' => 'id',
			'link_field_label' => 'ID',
			'record_identifier' => 'service',
			'child_tables' => ['tabRecoCities'],
			'child_foreign_key' => 'recommendation_id',
			'child_foreign_map' => [
				'tabRecoCities' => [
					'tabCity' => [
						'foreign_key' => 'city_id',
						'fetch_field' => 'tabCity.name as city'
					],
				]
			]
		];
	}
}