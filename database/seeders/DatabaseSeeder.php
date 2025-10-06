<?php

namespace Database\Seeders;

use App\Models\Battle;
use App\Models\User;
use App\Models\Meme;
use App\Models\Vote;
use Illuminate\Contracts\View\View;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $battles  = Battle::factory(3)->create();
        $memes = Meme::factory(20)->create();
        $users = User::factory(5)->create();
        $votes = Vote::factory(5)->create();
    }
}
