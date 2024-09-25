<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('courses')->insert([
            [
                'course_name' => 'Laravel for Beginners',
                'description' => 'Learn the basics of Laravel, one of the most popular PHP frameworks.',
                'duration' => 40,
                'price' => 200,
                'image_url' => null,
                'category_id' => 1
            ],
            [
                'course_name' => 'Business Management 101',
                'description' => 'An introduction to the fundamental concepts of business management.',
                'duration' => 60,
                'price' => 300,
                'image_url' => null,
                'category_id' => 2
            ],
            [
                'course_name' => 'Digital Painting Basics',
                'description' => 'Explore the world of digital art with this beginner course.',
                'duration' => 50,
                'price' => 150,
                'image_url' => null,
                'category_id' => 4
            ],
            [
                'course_name' => 'Health & Nutrition',
                'description' => 'Learn the basics of health and nutrition for a healthy lifestyle.',
                'duration' => 30,
                'price' => 100,
                'image_url' => null,
                'category_id' => 3
            ]
        ]);
    }
}
