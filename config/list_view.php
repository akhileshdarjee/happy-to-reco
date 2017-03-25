<?php

return [

	/*
	|--------------------------------------------------------------------------
	| List view config to show
	|--------------------------------------------------------------------------
	|
	| Contains columns, link field and search filter field for list view
	|
	*/

	'tabService' => [
		'link_field' => 'id',
		'search_via' => 'name',
		'cols' => ['name', 'status']
	],
	'tabRecommendation' => [
		'link_field' => 'id',
		'search_via' => 'service',
		'cols' => ['name', 'service', 'recommended_by', 'status']
	],
	'tabFriends' => [
		'link_field' => 'id',
		'search_via' => 'name',
		'cols' => ['name', 'email', 'status']
	],
	'tabRequest' => [
		'link_field' => 'id',
		'search_via' => 'service',
		'cols' => ['service', 'requested_by', 'city', 'status']
	],
	'tabReports' => [
		'link_field' => 'id',
		'search_via' => 'name',
		'cols' => ['name', 'type', 'module', 'status']
	],
	'tabUser' => [
		'link_field' => 'id',
		'search_via' => 'login_id',
		'cols' => ['login_id', 'full_name', 'role', 'status']
	],

];