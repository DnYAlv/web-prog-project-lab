<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function actors(){
        return $this->belongsToMany(Actor::class, 'characters', 'movie_id' ,'actor_id');
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'genre_movies', 'movie_id', 'genre_id');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'watchlists', 'movie_id', 'user_id');
    }
}
