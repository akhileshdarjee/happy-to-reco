<?php

namespace HappyToReco\Http\Controllers;

use Illuminate\Http\Request;

use HappyToReco\Http\Requests;
use HappyToReco\Http\Controllers\Controller;

class WebsiteController extends Controller
{
	// show website index page
	public function show() {
		return view('website');
	}
}