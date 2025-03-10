<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = [
            ['name' => 'Dr. Smith', 'clinic_id' => 1],
            ['name' => 'Dr. John', 'clinic_id' => 1],
            ['name' => 'Dr. Anna', 'clinic_id' => 2],
            ['name' => 'Dr. Kevin', 'clinic_id' => 2],
            ['name' => 'Dr. Maria', 'clinic_id' => 3],
            ['name' => 'Dr. Lucas', 'clinic_id' => 3],
            ['name' => 'Dr. Emma', 'clinic_id' => 4],
            ['name' => 'Dr. Michael', 'clinic_id' => 4],
            ['name' => 'Dr. Olivia', 'clinic_id' => 5],
            ['name' => 'Dr. William', 'clinic_id' => 5],
        ];

        foreach ($doctors as $doctor) {
            Doctor::create($doctor);
        }
    }
}
