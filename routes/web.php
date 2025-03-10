<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PatientAuthController;
use App\Http\Controllers\Auth\ClinicAuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ClinicDoctorController;

// Home route directs to login selection page
Route::get('/', function () {
    return redirect()->route('login.selection');
})->name('home');

// Login Selection
Route::get('login-selection', function () {
    return view('login_selection');
})->name('login.selection');

// Patient Routes
Route::get('login/patient', [PatientAuthController::class, 'showLoginForm'])->name('patient.login');
Route::post('login/patient', [PatientAuthController::class, 'login']);
Route::get('signup/patient', [PatientAuthController::class, 'showSignupForm'])->name('patient.signup');
Route::post('signup/patient', [PatientAuthController::class, 'signup']);
Route::post('logout/patient', [PatientAuthController::class, 'logout'])->name('patient.logout');

Route::middleware(['auth:patient'])->group(function () {
    Route::get('patient/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');
    Route::get('patient/profile', [PatientController::class, 'profile'])->name('patient.profile');
    Route::post('patient/profile', [PatientController::class, 'updatePassword'])->name('patient.updatePassword');
    Route::get('patient/book-appointment', [BookingController::class, 'showClinics'])->name('patient.bookAppointment');
    Route::get('patient/book-clinic/{clinic}', [BookingController::class, 'showAppointmentForm'])->name('patient.bookClinicForm');
    Route::post('patient/book-clinic/{clinic}', [BookingController::class, 'bookClinic'])->name('patient.bookClinic');
    Route::get('patient/appointment-details/{appointment}', [PatientController::class, 'appointmentDetails'])->name('patient.appointmentDetails');
});

// Clinic Routes
Route::get('login/clinic', [ClinicAuthController::class, 'showLoginForm'])->name('clinic.login');
Route::post('login/clinic', [ClinicAuthController::class, 'login']);
Route::post('logout/clinic', [ClinicAuthController::class, 'logout'])->name('clinic.logout');

Route::middleware(['auth:clinic'])->group(function () {
    Route::get('clinic/dashboard', [ClinicController::class, 'dashboard'])->name('clinic.dashboard');
    Route::get('clinic/appointments', [ClinicController::class, 'appointments'])->name('clinic.appointments');
    Route::get('clinic/appointment-details/{appointment}', [ClinicController::class, 'appointmentDetails'])->name('clinic.appointmentDetails');
    Route::post('clinic/appointment-status/{appointment}', [ClinicController::class, 'updateAppointmentStatus'])->name('clinic.updateAppointmentStatus');
    Route::post('clinic/update-all-appointments', [ClinicController::class, 'updateAllAppointments'])->name('clinic.updateAllAppointments'); // Add this line

    // Define the route for clinic doctors
    Route::get('clinic/doctors', [ClinicDoctorController::class, 'index'])->name('clinic.doctors.index');
    Route::get('clinic/doctors/create', [ClinicDoctorController::class, 'create'])->name('clinic.doctors.create');
    Route::post('clinic/doctors', [ClinicDoctorController::class, 'store'])->name('clinic.doctors.store');
    Route::get('clinic/doctors/{doctor}/edit', [ClinicDoctorController::class, 'edit'])->name('clinic.doctors.edit');
    Route::put('clinic/doctors/{doctor}', [ClinicDoctorController::class, 'update'])->name('clinic.doctors.update');
    Route::delete('clinic/doctors/{doctor}', [ClinicDoctorController::class, 'destroy'])->name('clinic.doctors.destroy');
    Route::get('clinic/doctors/{doctor}/schedule', [ClinicDoctorController::class, 'schedule'])->name('clinic.doctors.schedule');
});

// Doctor Routes
Route::get('login/doctor', [DoctorAuthController::class, 'showLoginForm'])->name('doctor.login');
Route::post('login/doctor', [DoctorAuthController::class, 'login']);
Route::post('logout/doctor', [DoctorAuthController::class, 'logout'])->name('doctor.logout');

Route::middleware(['auth:doctor'])->group(function () {
    Route::get('doctor/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
    Route::get('doctor/patient-records/{patient}', [DoctorController::class, 'patientRecords'])->name('doctor.patientRecords');
});

// Additional Routes
// Add any other routes related to your application

// Fallback route for 404
Route::fallback(function () {
    return view('404');
});
