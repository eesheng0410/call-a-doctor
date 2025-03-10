<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    public function run()
    {
        Patient::create([
            'name' => 'John Doe',
            'age' => 35,
            'gender' => 'Male',
            'prescription' => 'Medicine A, Medicine B',
        ]);
    }
}
