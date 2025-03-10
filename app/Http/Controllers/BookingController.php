<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Clinic;

class BookingController extends Controller
{
    public function showClinics()
    {
        $clinics = Clinic::all()->unique('id');
        $areas = Clinic::distinct()->pluck('area');
        return view('patient.book_appointment', compact('clinics', 'areas'));
    }

    public function showAppointmentForm(Clinic $clinic)
    {
        return view('patient.create_appointment', compact('clinic'));
    }

    public function bookClinic(Request $request, Clinic $clinic)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|string|in:Male,Female,Other',
            'appointment_date' => 'required|date|after:today',
            'appointment_time' => 'required|date_format:H:i',
            'type_of_service' => 'required|string|max:255',
            'details' => 'nullable|string'
        ]);

        Appointment::create([
            'patient_id' => auth()->id(),
            'clinic_id' => $clinic->id,
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'type_of_service' => $request->type_of_service,
            'details' => $request->details,
            'status' => 'pending'
        ]);

        return redirect()->route('patient.dashboard')->with('success', 'Appointment created successfully. Please await the results from the clinic.');
    }
}
