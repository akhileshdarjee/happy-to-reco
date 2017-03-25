<?php

namespace HappyToReco\Http\Controllers;

use Illuminate\Http\Request;

use HappyToReco\Http\Requests;
use HappyToReco\Http\Controllers\Controller;

class RequestController extends Controller
{
	// define common variables
	public $form_config;

	public function __construct() {
		$this->form_config = [
			'module' => 'Request',
			'module_label' => 'Request',
			'module_icon' => 'fa fa-gift',
			'table_name' => 'tabRequest',
			'view' => 'layouts.request',
			'link_field' => 'id',
			'link_field_label' => 'ID',
			'record_identifier' => 'service',
			'parent_foreign_map' => [
				'tabUser' => [
					'foreign_key' => 'user_id',
					'fetch_field' => 'tabUser.name as requested_by'
				]
			],
		];
	}
}