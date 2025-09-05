<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2),
            'location' => fake()->city(),
            'description' => fake()->paragraph(7),
            'user_id' => User::inRandomOrder()->value('id'),
            'from' => fake()->dateTimeBetween('now','+2 weeks'),
            'due' => fake()->dateTimeBetween('+2 days', '+3 weeks'),
        ];
    }
}
