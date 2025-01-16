<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Politician;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PoliticiansOrder>
 */
class PoliticiansOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $order = Order::query()->inRandomOrder()->first();
        $politician = Politician::query()->inRandomOrder()->first();
        return [
            'order_id' => $order->id,
            'politician_id' => $politician->id
        ];
    }
}
