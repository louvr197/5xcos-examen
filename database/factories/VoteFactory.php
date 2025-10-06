<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Meme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vote>
 */
class VoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'score'=>rand(0,5),
            'user_id' => User::all()->random()->id,
            'meme_id' => Meme::all()->random()->id,
        ];
    }
}
