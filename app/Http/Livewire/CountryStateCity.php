<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Livewire\Component;

class CountryStateCity extends Component
{
	public $countries;
	public $states;
	public $cities;

	public $selectedCountry = null;
	public $selectedState = null;

	public function mount()
	{
		$this->countries = Country::all();
	}



	public function updatedSelectedCountry($country)
	{
		$this->states = State::where('country_id', $country)->get();
	}

	public function render()
	{
		return view('livewire.country-state-city');
	}

	public function updatedSelectedState($state)
	{
		if (!is_null($state)) {
			$this->cities = City::where('state_id', $state)->get();
		}
	}
}
