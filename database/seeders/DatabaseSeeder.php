<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\University;
use App\Models\Faculty;
use App\Models\Department;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Option 1: Quick fake data
        Department::factory(50)->create();

        // Option 2: Structured fake data (optional, comment if not needed)
        University::factory(3)->create()->each(function ($university) {
            $faculties = Faculty::factory(3)->create([
                'university_id' => $university->id,
            ]);

            $faculties->each(function ($faculty) {
                Department::factory(5)->create([
                    'faculty_id' => $faculty->id,
                ]);
            });
        });
    }
}
