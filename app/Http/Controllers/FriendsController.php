<?php

namespace HappyToReco\Http\Controllers;

use Illuminate\Http\Request;

use HappyToReco\Http\Requests;
use HappyToReco\Http\Controllers\Controller;

class FriendsController extends Controller
{
	// define common variables
	public $form_config;

	public function __construct() {
		$this->form_config = [
			'module' => 'Friends',
			'module_label' => 'Friends',
			'module_icon' => 'fa fa-heart',
			'table_name' => 'tabFriends',
			'view' => 'layouts.friends',
			'link_field' => 'id',
			'link_field_label' => 'ID',
			'record_identifier' => 'name',
			'parent_foreign_map' => [
				'tabUser' => [
					'foreign_key' => 'user_id',
					'fetch_field' => 'tabUser.name as friend_of'
				]
			],
		];
	}
}