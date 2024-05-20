<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define primary school course content
        $courses = [
            [
                'name' => 'Pre-KG',
                'description' => 'Pre-Kindergarten - Introduction to basic learning skills for young children.',
            ],
            [
                'name' => 'LKG',
                'description' => 'Lower Kindergarten - Building foundational skills in reading, writing, and numeracy.',
            ],
            [
                'name' => 'UKG',
                'description' => 'Upper Kindergarten - Further development of foundational skills in preparation for primary education.',
            ],
            [
                'name' => 'Grade 1',
                'description' => 'Grade 1 - Introduction to primary education, covering basic subjects such as Mathematics, English, and Science.',
            ],
            [
                'name' => 'Grade 2',
                'description' => 'Grade 2 - Continued development of fundamental skills in core subjects.',
            ],
            [
                'name' => 'Grade 3',
                'description' => 'Grade 3 - Further exploration of core subjects with an emphasis on comprehension and critical thinking.',
            ],
            [
                'name' => 'Grade 4',
                'description' => 'Grade 4 - Advanced learning in core subjects and introduction to new topics.',
            ],
            [
                'name' => 'Grade 5',
                'description' => 'Grade 5 - Preparation for upper primary education with a focus on independent learning and research.',
            ],
            [
                'name' => 'Grade 6',
                'description' => 'Grade 6 - Final year of primary education, preparing students for the transition to secondary school.',
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
