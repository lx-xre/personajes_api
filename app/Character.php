<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = ['name', 'movie_id', 'image', 'description'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
