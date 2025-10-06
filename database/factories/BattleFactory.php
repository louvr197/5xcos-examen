<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Battle>
 */
class BattleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->bs(),
            'description'=>fake()->realTextBetween(),
            'limit_date'=>fake()->dateTimeBetween('-1 week','+1 week'),
            'user_id' => User::all()->random()->id
        ];
    }
}
