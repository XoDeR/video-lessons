<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(),
            'questions' => [
                [
                    'question_text' => fake()->text(),
                    'type' => 'text',
                ],
                [
                    'question_text' => fake()->text(),
                    'type' => 'single',
                    'options' => ['Yes', 'No'],
                ],
            ]
        ];
    }
}
