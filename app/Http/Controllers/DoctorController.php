<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function fakeLogin(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'password' => 'required',
        ]);

        if ($request->doctor_id === 'doctor' && $request->password === 'doctor') {
            return redirect()->route('doctor.dashboard');
        }

        return back()->withErrors([
            'doctor_id' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard()
    {
        return view('doctor.dashboard');
    }

    public function logout()
    {
        return redirect()->route('doctor.login');
    }
}
