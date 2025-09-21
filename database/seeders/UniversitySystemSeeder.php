<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\University;
use App\Models\Faculty;
use App\Models\Department;

class UniversitySystemSeeder extends Seeder
{
    public function run(): void
    {
        // Example: Create 5 universities, each with 3 faculties, each with 4 departments
        University::factory(5)->create()->each(function ($university) {
            $faculties = Faculty::factory(3)->create([
                'university_id' => $university->id,
            ]);

            $faculties->each(function ($faculty) {
                Department::factory(4)->create([
                    'faculty_id' => $faculty->id,
                ]);
            });
        });
    }
}
