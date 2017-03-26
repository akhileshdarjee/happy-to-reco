<?php

namespace HappyToReco\Http\Controllers;

use Illuminate\Http\Request;

use HappyToReco\Http\Requests;
use HappyToReco\Http\Controllers\Controller;

class CityController extends Controller
{
	// define common variables
	public $form_config;

	public function __construct() {
		$this->form_config = [
			'module' => 'City',
			'module_label' => 'City',
			'module_icon' => 'fa fa-location-arrow',
			'table_name' => 'tabCity',
			'view' => 'layouts.city',
			'link_field' => 'id',
			'link_field_label' => 'ID',
			'record_identifier' => 'name'
		];
	}
}