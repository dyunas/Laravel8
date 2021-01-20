<template>
	<div>
		<div class="form-group row">
			<label for class="col-lg-2">Country</label>
			<div class="col-lg-10">
				<select class="form-control" v-model="selectedCountry" v-on:change="getListOfStates()">
					<option v-for="(country, index) in countries" :key="index" :value="country.id">{{ country.country }}</option>
				</select>
			</div>
		</div>

		<div class="form-group row" v-if="this.states.length > 0">
			<label for class="col-lg-2">State</label>
			<div class="col-lg-10">
				<select class="form-control" v-model="selectedState" v-on:change="getListOfCities()">
					<option v-for="(state, index) in states" :key="index" :value="state.id">{{ state.state }}</option>
				</select>
			</div>
		</div>

		<div class="form-group row" v-if="this.cities.length > 0">
			<label for class="col-lg-2">City</label>
			<div class="col-lg-10">
				<select class="form-control" v-model="selectedCity" v-on:change="getListOfCities()">
					<option v-for="(city, index) in cities" :key="index" :value="city.id">{{ city.city }}</option>
				</select>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	data() {
		return {
			countries: [],
			states: [],
			cities: [],
			selectedCountry: '',
			selectedState: '',
			selectedCity: '',
		};
	},

	mounted() {
		this.getAllCountries();
	},

	methods: {
		getAllCountries() {
			this.states.splice(0)
			this.cities.splice(0)

			axios
				.get("http://localhost:8000/vue/get_all_countries")
				.then(response => {
					this.countries = response.data
				})
				.catch(error => console.log(error))
		},

		getListOfStates() {
			this.cities.splice(0)

			axios.get("http://localhost:8000/vue/get_states_list?country_id=" + this.selectedCountry)
			.then(response => {
				this.states = response.data
			})
			.catch(error => console.log(error))
		},

		getListOfCities() {
			axios.get("http://localhost:8000/vue/get_cities_list?state_id=" + this.selectedState)
			.then(response => {
				this.cities = response.data
			})
			.catch(error => console.log(error))
		}
	}
};
</script>
