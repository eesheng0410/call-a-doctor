<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clinic;

class ClinicsTableSeeder extends Seeder
{
    public function run()
    {
        $clinics = [
            ['name' => 'Clinic A', 'area' => 'George Town', 'pin' => '1234'],
            ['name' => 'Clinic B', 'area' => 'Bayan Lepas', 'pin' => '5678'],
            ['name' => 'Clinic C', 'area' => 'Bukit Mertajam', 'pin' => '9101'],
            ['name' => 'Clinic D', 'area' => 'Balik Pulau', 'pin' => '1121'],
            ['name' => 'Clinic E', 'area' => 'Butterworth', 'pin' => '3141'],
        ];

        foreach ($clinics as $clinic) {
            Clinic::create($clinic);
        }
    }
}
