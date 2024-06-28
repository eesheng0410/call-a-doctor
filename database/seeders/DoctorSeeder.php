<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{
    public function run()
    {
        Doctor::create([
            'id' => 'doctor',
            'password' => Hash::make('doctor'),
            'name' => 'Dr. John Smith',
            'specialization' => 'General Practitioner',
            'clinic_id' => 1, // Assuming there is a clinic with id 1
        ]);
    }
}
