<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('doctor.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->doctor_id, // Assuming 'doctor_id' is actually 'email' field
            'password' => $request->password,
        ];

        if (Auth::guard('doctor')->attempt($credentials)) {
            return redirect()->intended(route('doctor.dashboard'));
        }

        return back()->withErrors([
            'doctor_id' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect()->route('doctor.login');
    }
}
