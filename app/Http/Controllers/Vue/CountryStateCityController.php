<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class CountryStateCityController extends Controller
{
	public function index()
	{
		return view('VueSamples.dropdown-dependent');
	}

	public function getAllCountries()
	{
		$data = Country::all();

		return response()->json($data, 200);
	}

	public function getStatesList(Request $request)
	{
		$data = State::where('country_id', $request->country_id)->get();

		return response()->json($data, 200);
	}

	public function getCitiesList(Request $request)
	{
		$data = City::where('state_id', $request->state_id)->get();

		return response()->json($data, 200);
	}
}
