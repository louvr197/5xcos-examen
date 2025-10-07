<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    /** @use HasFactory<\Database\Factories\BattleFactory> */
    use HasFactory;

    protected $fillable = ['title', 'description', 'limit_date', 'user_id'];

    public function memes()
    {
        return $this->hasMany(Meme::class);
    }
    public function poster()
    {
        return $this->belongsTo(User::class);
    }
    public function winner()
    {
        return $this->memes->sortByDesc(function ($meme) {
            return $meme->score();
        })->first();
    }

    public function is_open()
    {
        return $this->limit_date >= now();
    }
}
