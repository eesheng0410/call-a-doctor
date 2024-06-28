<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class ClinicDoctorController extends Controller
{
    public function index()
    {
        $clinicId = auth()->id();
        $doctors = Doctor::where('clinic_id', $clinicId)->get();
        return view('clinic.doctors.index', compact('doctors'));
    }

    public function create()
{
    $specializations = [
        'General Practitioner',
        'Pediatrics',
        'Cardiology',
        'Dermatology',
        'Neurology',
        'Oncology',
        'Orthopedics',
        'Psychiatry',
        'Radiology',
        'Surgery'
    ];

    return view('clinic.doctor.create', compact('specializations'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        Doctor::create([
            'name' => $request->name,
            'specialization' => $request->specialization,
            'clinic_id' => auth()->id(),
        ]);

        return redirect()->route('clinic.doctors.index')->with('success', 'Doctor added successfully.');
    }

    public function edit(Doctor $doctor)
    {
        return view('clinic.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
        ]);

        $doctor->update([
            'name' => $request->name,
            'specialization' => $request->specialization,
        ]);

        return redirect()->route('clinic.doctors.index')->with('success', 'Doctor updated successfully.');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('clinic.doctors.index')->with('success', 'Doctor deleted successfully.');
    }

    public function schedule(Doctor $doctor)
    {
        // Assuming you have a schedule relationship in Doctor model
        $appointments = $doctor->appointments;
        return view('clinic.doctors.schedule', compact('doctor', 'appointments'));
    }
}
