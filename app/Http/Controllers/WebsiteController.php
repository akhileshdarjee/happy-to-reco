<?php

namespace HappyToReco\Http\Controllers;

use Auth;
use DB;
use Session;
use Illuminate\Http\Request;

use HappyToReco\Http\Requests;
use HappyToReco\Http\Controllers\Controller;

class WebsiteController extends Controller
{
	// show website index page
	public function show() {
		if (Auth::check()) {
			return $this->getDashboard();
		}
		else {
			return view('website.layouts.index');
		}
	}

	public function getRecommendation() {
		$services = DB::table('tabService')
			->select('id', 'name')
			->where('status', 'Active')
			->get();

		return view('website.layouts.recommendation_form')->with(compact('services'));
	}

	public function home() {
		return view('website.layouts.home');
	}

	public function recommendation_details() {
		return view('website.layouts.recommendation_details');
	}

	public function recommendation_look() {
		$services = DB::table('tabService')
			->select('id', 'name')
			->where('status', 'Active')
			->get();

		return view('website.layouts.recommendation_look')->with(compact('services'));
	}


	// get user dashboard
	public function getDashboard() {
		if (Auth::check()) {
			$login_id = Session::get('login_id');

			$recommendations = DB::table('tabRecommendation')
				->leftJoin('tabRecoCities', 'tabRecommendation.id', '=', 'tabRecoCities.recommendation_id')
				->select(
					'tabRecommendation.id', 'tabRecommendation.service', 'tabRecommendation.name', 
					'tabRecommendation.avatar', 'tabRecoCities.city'
				)
				->where('tabRecommendation.status', 'Active')
				->where('tabRecommendation.owner', $login_id)
				->get();

			$needed = DB::table('tabRequest')
				->leftJoin('tabService', 'tabRequest.service_id', '=', 'tabService.id')
				->select(
					'tabService.avatar', 'tabService.name', 'tabRequest.city'
				)
				->where('tabService.status', 'Active')
				->where('tabRequest.status', 'Active')
				->where('tabRequest.owner', $login_id)
				->get();

			return view('website.layouts.index')->with(compact('recommendations', 'needed'));
		}
		else {
			return view('website.layouts.index');
		}
	}

	public function recommendation_search() {
		return view('website.layouts.recommendation_search');
	}
}