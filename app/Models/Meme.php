<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meme extends Model
{
    /** @use HasFactory<\Database\Factories\MemeFactory> */
    use HasFactory;
    protected $fillable = ['meme_path'];

    public function battle(){
        return $this->belongsTo(Battle::class);
    }
        public function poster(){
        return $this->belongsTo(User::class);
    }
    public function votes(){
        return $this->hasMany(Vote::class);
    }

    public function score(){
        // dump($this->votes);

        $sum = 0;
        foreach ($this->votes as $vote)
            $sum += $vote->score;
        return count($this->votes)?$sum / count($this->votes):0;
    }


}
