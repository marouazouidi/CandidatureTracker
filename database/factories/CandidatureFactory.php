<?php

namespace Database\Factories;

use App\Models\Candidature;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Candidature>
 */
class CandidatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->sentence(6),
            'poste_title' => fake()->sentence(6),
            'poste_url' => fake()->url(),
            'status' => fake()->randomElement(['to_review', 'interview_scheduled', 'offer_received', 'rejected', 'abandoned']),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'notes' => fake()->paragraph(),
            'date' => fake()->date(),
            'user_id' => 1, // Assuming 
        ];
    }
}
