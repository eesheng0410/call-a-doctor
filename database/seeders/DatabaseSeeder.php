<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Patient;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DoctorSeeder::class,
            PatientSeeder::class,
        ]);
    }
}
