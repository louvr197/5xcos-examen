<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    /** @use HasFactory<\Database\Factories\BattleFactory> */
    use HasFactory;

    protected $fillable =['title','description','limit_date'];

    public function memes(){
        return $this->hasMany(Meme::class);
    }
}
