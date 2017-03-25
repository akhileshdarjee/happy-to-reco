<?php

namespace HappyToReco\Http\Controllers;

use Illuminate\Http\Request;

use HappyToReco\Http\Requests;
use HappyToReco\Http\Controllers\Controller;

class ServiceController extends Controller
{
	// define common variables
	public $form_config;

	public function __construct() {
		$this->form_config = [
			'module' => 'Service',
			'module_label' => 'Service',
			'module_icon' => 'fa fa-magic',
			'table_name' => 'tabService',
			'view' => 'layouts.service',
			'link_field' => 'id',
			'link_field_label' => 'ID',
			'record_identifier' => 'name'
		];
	}
}