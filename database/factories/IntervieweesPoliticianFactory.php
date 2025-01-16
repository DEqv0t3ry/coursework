<?php

namespace Database\Factories;

use App\Models\Interviewee;
use App\Models\Politician;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IntervieweesPolitician>
 */
class IntervieweesPoliticianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $interviewee = Interviewee::query()->inRandomOrder()->first();
        $politician = Politician::query()->inRandomOrder()->first();
        return [
            'interviewee_id' => $interviewee->id,
            'politician_id' => $politician->id,
            'priority' => fake()->numberBetween(1, 5),
            'date' => fake()->date(),
        ];
    }
}
