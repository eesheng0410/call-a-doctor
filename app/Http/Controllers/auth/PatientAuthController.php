<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;

class PatientAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('patient.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('patient')->attempt($credentials)) {
            return redirect()->intended(route('patient.dashboard'));
        }

        return redirect()->back()->withErrors(['email' => 'Invalid email or password']);
    }

    public function showSignupForm()
    {
        return view('patient.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:patients',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $patient = Patient::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('patient')->login($patient);

        return redirect()->route('patient.dashboard');
    }

    public function logout()
    {
        Auth::guard('patient')->logout();
        return redirect(route('login.selection'));
    }
}
