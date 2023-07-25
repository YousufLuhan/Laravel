<?php

namespace Database\Seeders;

use App\Models\student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{

    public function run(): void
    {
        student::create([
            "Name"=>"Karim Ahmed",
            "Age"=>20,
            "Phone"=>"01874962268"
        ]);
    }
}