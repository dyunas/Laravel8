<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Route::get('/dropdown-dependent', function () {
	return view('LivewireSamples.dropdown-dependent');
});

Route::get('vue/dropdown-dependent', [\App\Http\Controllers\Vue\CountryStateCityController::class, 'index']);
Route::get('vue/get_all_countries', [\App\Http\Controllers\Vue\CountryStateCityController::class, 'getAllCountries']);
Route::get('vue/get_states_list', [\App\Http\Controllers\Vue\CountryStateCityController::class, 'getStatesList']);
Route::get('vue/get_cities_list', [\App\Http\Controllers\Vue\CountryStateCityController::class, 'getCitiesList']);

Route::get('vue/appointment-booking', [\App\Http\Controllers\Vue\AppointmentBookingController::class, 'index']);
Route::get('vue/get_doctors_list', [\App\Http\Controllers\Vue\AppointmentBookingController::class, 'getDoctorsList']);
Route::get('vue/get_available_schedules', [\App\Http\Controllers\Vue\AppointmentBookingController::class, 'getAvailableSchedule']);
