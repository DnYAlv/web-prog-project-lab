<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function actors(){
        return $this->belongsToMany(Actor::class, 'characters', 'movie_id' ,'actor_id')->withPivot('character_name');
    }

    public function genres(){
        return $this->belongsToMany(Genre::class, 'genre_movies', 'movie_id', 'genre_id');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'watchlists', 'movie_id', 'user_id')->withPivot('watchlist_status');
    }

    public function scopeWithSearch(Builder $query, $search){
        if(!is_null($search)){
            return $query->where('title', 'like', "%{$search}%");
        }

        return $query;
    }

    public function scopeWithSortBy(Builder $query, $sortBy){
        if(!is_null($sortBy)){
            if($sortBy == 'Latest'){
                return $query->latest();
            }elseif($sortBy == 'Ascending'){
                return $query->orderBy('title', 'asc');
            }elseif($sortBy == 'Descending'){
                return $query->orderBy('title', 'desc');
            }
        }

        return $query;
    }

    public function scopeWithGenre(Builder $query, $genreChosen){
        if(!is_null($genreChosen)){
            return $query->whereHas('genres', function($query) use ($genreChosen){
                $query->where('genre_name', 'like', "%{$genreChosen}%");
            });
        }
    }

    
}
