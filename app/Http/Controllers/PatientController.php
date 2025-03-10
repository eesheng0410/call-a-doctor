<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function dashboard()
    {
        $patient = Auth::guard('patient')->user();
        $appointments = Appointment::where('patient_id', $patient->id)->get();

        return view('patient.dashboard', compact('appointments'));
    }

    public function profile()
    {
        return view('patient.profile');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
            'confirm_new_password' => 'required|same:new_password',
            'tip' => 'nullable|string|max:255',
        ]);

        $patient = Auth::guard('patient')->user();

        if (!Hash::check($request->current_password, $patient->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $patient->password = Hash::make($request->new_password);
        $patient->tip = $request->tip;
        $patient->save();

        return redirect()->route('patient.profile')->with('success', 'Password changed successfully.');
    }

    public function appointmentDetails(Appointment $appointment)
    {
        $patient = Auth::guard('patient')->user();

        if ($appointment->patient_id != $patient->id) {
            return redirect()->route('patient.dashboard')->withErrors('You do not have access to this appointment.');
        }

        return view('patient.appointment_details', compact('appointment'));
    }
}
