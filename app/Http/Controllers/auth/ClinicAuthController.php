<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Clinic;

class ClinicAuthController extends Controller
{
    public function showLoginForm()
    {
        $clinics = Clinic::all();
        return view('clinic.login', compact('clinics'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'clinic_id' => 'required|exists:clinics,id',
            'pin' => 'required',
        ]);

        $clinic = Clinic::find($request->clinic_id);

        if ($clinic && $clinic->pin === $request->pin) {
            Auth::guard('clinic')->login($clinic);
            return redirect()->route('clinic.dashboard');
        }

        return back()->withErrors([
            'clinic_id' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('clinic')->logout();
        return redirect()->route('clinic.login');
    }
}
