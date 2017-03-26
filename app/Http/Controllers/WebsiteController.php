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

		$cities = DB::table('tabCity')
			->select('id', 'name')
			->where('status', 'Active')
			->get();

		return view('website.layouts.add_recommendation')->with(compact('services', 'cities'));
	}


	public function postRecommendation() {
		$services = DB::table('tabService')
			->select('id', 'name')
			->where('status', 'Active')
			->get();

		$cities = DB::table('tabCity')
			->select('id', 'name')
			->where('status', 'Active')
			->get();

		return view('website.layouts.add_recommendation')->with(compact('services', 'cities'));
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
			$recommendations = [];

			$recommended = DB::table('tabRecommendation')
				->leftJoin('tabRecoCities', 'tabRecommendation.id', '=', 'tabRecoCities.recommendation_id')
				->leftJoin('tabCity', 'tabRecoCities.city_id', '=', 'tabCity.id')
				->select(
					'tabRecommendation.id', 'tabRecommendation.service', 'tabRecommendation.name', 
					'tabRecommendation.avatar', 'tabCity.name as city'
				)
				->where('tabRecommendation.status', 'Active')
				->where('tabCity.status', 'Active')
				->where('tabRecommendation.owner', $login_id)
				->get();

			foreach ($recommended as $recommend) {
				$city = $recommend->city;
				unset($recommend->city);

				if (isset($recommendations[$recommend->id])) {
					if (!in_array($city, $recommendations[$recommend->id]->cities)) {
						array_push($recommendations[$recommend->id]->cities, $city);
					}
				}
				else {
					$recommendations[$recommend->id] = $recommend;
					$recommendations[$recommend->id]->cities = [$city];
				}
			}

			$needed = DB::table('tabRequest')
				->leftJoin('tabService', 'tabRequest.service_id', '=', 'tabService.id')
				->leftJoin('tabCity', 'tabRequest.city_id', '=', 'tabCity.id')
				->select(
					'tabService.avatar', 'tabService.name', 'tabCity.name as city'
				)
				->where('tabService.status', 'Active')
				->where('tabRequest.status', 'Active')
				->where('tabCity.status', 'Active')
				->where('tabRequest.owner', $login_id)
				->get();

			return view('website.layouts.dashboard')->with(compact('recommendations', 'needed'));
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
				'tabUser.full_name', 'tabService.name as service'
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
			->leftJoin('tabRecoCities', 'tabRecommendation.id', '=', 'tabRecoCities.recommendation_id')
			->leftJoin('tabCity', 'tabRecoCities.city_id', '=', 'tabCity.id')
			->leftJoin('tabUser', 'tabRecommendation.owner', '=', 'tabUser.login_id')
			->select(
				'tabRecommendation.id', 'tabRecommendation.name', 'tabRecommendation.avatar', 
				'tabUser.full_name as recommended_by', 'tabCity.name as city'
			);

		if (Auth::check()) {
			$recommendation = $recommendation->addSelect(
				'tabRecommendation.contact_no', 'tabRecommendation.address', 'tabRecommendation.description'
			);
		}

		$recommendation = $recommendation->where('tabRecommendation.status', 'Active')
			->where('tabRecommendation.id', $id)
			->get();

		if (count($recommendation) == 1) {
			$recommendation = $recommendation[0];
			$recommendation->cities = [$recommendation->city];
			unset($recommendation->city);
		}
		elseif (count($recommendation) > 1) {
			$recommendations = [];

			foreach ($recommendation as $recommend) {
				$city = $recommend->city;
				unset($recommend->city);

				if (isset($recommendations[$recommend->id])) {
					if (!in_array($city, $recommendations[$recommend->id]->cities)) {
						array_push($recommendations[$recommend->id]->cities, $city);
					}
				}
				else {
					$recommendations[$recommend->id] = $recommend;
					$recommendations[$recommend->id]->cities = [$city];
				}
			}

			$recommendation = reset($recommendations);
		}
		else {
			$recommendation = 0;
		}

		$service = DB::table('tabService')
			->where('slug', $slug)
			->where('status', 'Active')
			->pluck('name');

		$service = is_array($service) ? $service[0] : $service;

		if ($recommendation) {
			return view('website.layouts.recommendation')->with(compact('recommendation', 'slug', 'service'));
		}
		else {
			return redirect()->route('show.website');
		}
	}
}