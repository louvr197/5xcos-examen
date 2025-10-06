<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /** @use HasFactory<\Database\Factories\VoteFactory> */
    use HasFactory;
    protected $fillable = ['score','meme_id','user_id'];

    public function voter(){
        return $this->belongsTo(User::class);
    }
    public function meme(){
        return $this->belongsTo(Meme::class);
    }
}
