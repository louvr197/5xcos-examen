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
    public function votes(){
        return $this->hasMany(Vote::class);
    }
    

}
