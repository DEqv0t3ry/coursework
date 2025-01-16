<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interviewee>
 */
class IntervieweeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'second_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'age' => fake()->numberBetween(16, 80),
            'sex' => fake()->randomElement(['male', 'female']),
        ];
    }
}
