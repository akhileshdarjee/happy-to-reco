<?php

namespace HappyToReco\Http\Controllers;

use DB;
use Session;
use Illuminate\Http\Request;

use HappyToReco\Http\Requests;
use HappyToReco\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public static function show() {
		$data = [];

		if (Session::has('role') && Session::get('role') == 'Administrator') {
			return view('index', array('data' => $data, 'file' => 'layouts.app.dashboard'));
		}
		else {
			abort('404');
		}
	}
}