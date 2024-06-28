<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class ClinicController extends Controller
{
    public function dashboard()
    {
        $clinicId = auth()->id();
        $appointments = Appointment::where('clinic_id', $clinicId)->get();
        $doctors = Doctor::where('clinic_id', $clinicId)->get();

        return view('clinic.dashboard', compact('appointments', 'doctors'));
    }

    public function appointments()
    {
        $clinic = Auth::guard('clinic')->user();
        $appointments = Appointment::where('clinic_id', $clinic->id)->get();

        return view('clinic.appointment', compact('appointments'));
    }

    public function appointmentDetails(Appointment $appointment)
    {
        $clinic = Auth::guard('clinic')->user();

        if ($appointment->clinic_id != $clinic->id) {
            return redirect()->route('clinic.appointments')->withErrors('You do not have access to this appointment.');
        }

        return view('clinic.appointment_details', compact('appointment'));
    }

    public function updateAppointmentStatus(Request $request, Appointment $appointment)
    {
        $appointment->update([
            'status' => $request->status,
        ]);

        return redirect()->route('clinic.appointments')->with('success', 'Appointment status updated successfully.');
    }

    public function updateAllAppointments(Request $request)
    {
        $clinic = Auth::guard('clinic')->user();
        $statuses = $request->input('status', []);

        foreach ($statuses as $id => $status) {
            $appointment = Appointment::where('clinic_id', $clinic->id)->where('id', $id)->first();
            if ($appointment) {
                $appointment->update(['status' => $status]);
            }
        }

        return redirect()->route('clinic.appointments')->with('success', 'All appointments updated successfully.');
    }
}
