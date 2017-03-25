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

	public function addRecommendation() {
		$services = DB::table('tabService')
			->select('id', 'name')
			->where('status', 'Active')
			->get();

		return view('website.layouts.add_recommendation')->with(compact('services'));
	}

	public function home() {
		return view('website.layouts.home');
	}

	public function recommendation_details() {
		return view('website.layouts.recommendation_details');
	}

	public function getServices() {
		$services = DB::table('tabService')
			->select('id', 'name', 'avatar', 'slug')
			->where('status', 'Active')
			->get();

		return view('website.layouts.services')->with(compact('services'));
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

	public function getServiceRecommendations(Request $request, $slug) {
		$recommendations = DB::table('tabRecommendation')
			->leftJoin('tabService', 'tabRecommendation.service_id', '=', 'tabService.id')
			->leftJoin('tabUser', 'tabRecommendation.owner', '=', 'tabUser.login_id')
			->select(
				'tabRecommendation.id', 'tabRecommendation.name', 'tabRecommendation.avatar', 
				'tabUser.full_name', 'tabService.name'
			)
			->where('tabService.slug', $slug)
			->where('tabRecommendation.status', 'Active')
			->get();

		$service = DB::table('tabService')
			->where('slug', $slug)
			->where('status', 'Active')
			->pluck('name');

		$service = is_array($service) ? $service[0] : $service;

		if ($service) {
			return view('website.layouts.service_recommendations')->with(compact('recommendations', 'service', 'slug'));
		}
		else {
			return redirect()->route('show.website');
		}
	}


	public function getRecommendation(Request $request, $slug, $id) {
		$recommendation = DB::table('tabRecommendation')
			->leftJoin('tabUser', 'tabRecommendation.owner', '=', 'tabUser.login_id')
			->select(
				'tabRecommendation.name', 'tabRecommendation.avatar', 'tabUser.full_name'
			);

		if (Auth::check()) {
			$recommendation = $recommendation->addSelect(
				'tabRecommendation.contact_no', 'tabRecommendation.address', 'tabRecommendation.description'
			);
		}

		$recommendation = $recommendation->where('tabRecommendation.status', 'Active')
			->first();

		if ($recommendation) {
			return view('website.layouts.recommendation')->with(compact('recommendation'));
		}
		else {
			return redirect()->route('show.website');
		}
	}
}