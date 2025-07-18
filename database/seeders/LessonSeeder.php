<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::factory()->count(20)->create()->each(function ($lesson) {
            $lesson->update([
                'quiz_id' => Quiz::query()->inRandomOrder()->first()->id,
            ]);
        });
    }
}
