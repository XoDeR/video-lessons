<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $videoUrls = [
            'https://filesamples.com/samples/video/mp4/sample_960x540.mp4',
        ];

        $thumbnailUrls = [
            'https://images.pexels.com/photos/33020130/pexels-photo-33020130.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=720&w=1280',
            'https://images.pexels.com/photos/32742888/pexels-photo-32742888.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=720&w=1280',
        ];

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'video_url' => $this->faker->randomElement($videoUrls),
            'thumbnail_url' => $this->faker->randomElement($thumbnailUrls),
            'logo_url' => 'https://picsum.photos/id/77/170/170',
            'control_color' => $this->faker->hexColor,
            'quiz_id' => Quiz::query()->first()->id,
        ];
    }
}
