<div>
	<div class="form-group row">
		<label for="" class="col-lg-2">Country</label>
		<div class="col-lg-10">
			<select wire:model="selectedCountry" class="form-control">
				<option value="">Country</option>
				@foreach ($countries as $country)
				<option value="{{ $country->id }}">{{ $country->country }}</option>
				@endforeach
			</select>
		</div>
	</div>
	
	
	<div class="form-group row">
		<label for="" class="col-lg-2">State</label>
		<div class="col-lg-10">
			<select wire:model="selectedState" class="form-control">
				<option value="">State</option>
				@if (!is_null($selectedCountry))
					@forelse ($states as $state)
						<option value="{{ $state->id }}">{{ $state->state }}</option>
					@empty
						<option value="">No data</option>
					@endforelse
				@endif
			</select>
		</div>
	</div>
	
	@if (!is_null($selectedState))
	<div class="form-group row">
		<label for="" class="col-lg-2">City</label>
		<div class="col-lg-10">
			<select class="form-control">
				<option value="">City</option>
				@foreach ($cities as $city)
					<option value="{{ $city->id }}">{{ $city->city }}</option>
				@endforeach
			</select>
		</div>
	</div>
	@endif	
</div>