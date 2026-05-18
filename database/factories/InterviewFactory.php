<?php

namespace Database\Factories;

use App\Models\Interview;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Interview>
 */
class InterviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['Téléphone', 'Technique', 'RH', 'Final']),
            'interview_date' => fake()->dateTimeBetween('now', '+1 year'),
            'interview_time' => fake()->time(),
            'preparation_notes' => fake()->paragraph(),
            'result' => fake()->randomElement(['pending', 'positive', 'negative']),
            'candidature_id' => 1, // Assuming you have a candidature with ID 1 in your database
        ];
    }
}
