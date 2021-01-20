<?php

namespace App\Http\Controllers\Vue;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Http\Request;

class AppointmentBookingController extends Controller
{
	public function index()
	{
		return view('VueSamples.appointment-booking');
	}

	public function getDoctorsList()
	{
		$data = Doctor::all();

		return response()->json($data, 200);
	}

	public function getAvailableSchedule(Request $request)
	{
		$data = Schedule::where('doctor_id', $request->doctor_id)->get();

		return response()->json($data, 200);
	}
}
