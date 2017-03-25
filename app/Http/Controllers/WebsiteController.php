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

	public function recommendation_form() {
		return view('website.layouts.recommendation_form');
	}

	public function home() {
		return view('website.layouts.home');
	}

	public function recommendation_details() {
		return view('website.layouts.recommendation_details');
	}
}