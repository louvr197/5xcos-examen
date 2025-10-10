<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vote;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = \App\Models\User::all();
        $memes = \App\Models\Meme::all();

        $pairs = [];
        // Generate up to 20 unique (user_id, meme_id) pairs
        while (count($pairs) < 20) {
            $userId = $users->random()->id;
            $memeId = $memes->random()->id;
            $key = $userId . '-' . $memeId;
            if (!isset($pairs[$key])) {
                $pairs[$key] = ['user_id' => $userId, 'meme_id' => $memeId];
            }
        }

        foreach ($pairs as $pair) {
            \App\Models\Vote::create([
                'score' => rand(0, 5),
                'user_id' => $pair['user_id'],
                'meme_id' => $pair['meme_id'],
            ]);
        }
    }
}
