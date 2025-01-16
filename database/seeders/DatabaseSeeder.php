<?php

namespace Database\Seeders;

use App\Models\Interviewee;
use App\Models\IntervieweesPolitician;
use App\Models\Order;
use App\Models\Politician;
use App\Models\PoliticiansOrder;
use App\Models\Territory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\TerritoryFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Territory::factory(20)->create();
        Politician::factory(100)->create();
        Interviewee::factory(1000)->create();
        Order::factory(250)->create();
        PoliticiansOrder::factory(150)->create();
        IntervieweesPolitician::factory(2500)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
