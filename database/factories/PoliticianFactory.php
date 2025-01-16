<?php

namespace Database\Factories;

use App\Models\Territory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Politician>
 */
class PoliticianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $territory = Territory::query()->inRandomOrder()->first();
        return [
            'second_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'sex' => fake()->randomElement(['male', 'female']),
            'age' => fake()->numberBetween(20, 70),
            'territory_id' => $territory->id
        ];
    }
}
