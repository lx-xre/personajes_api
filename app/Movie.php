<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['name', 'genre', 'release_date', 'review', 'season'];

    public function characters()
    {
        return $this->hasMany(Character::class);
    }
}
