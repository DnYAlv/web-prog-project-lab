<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function movie(){
        return $this->belongsTo(Movie::class, 'movie_id');
    }

    public function scopeWithWatchlistStatus(Builder $query, $watchlist_status){
        if($watchlist_status != 'All'){
            return $query->where('watchlist_status', 'like', "%{$watchlist_status}%");
        }
        return $query;
    }

    public function scopeWithSearch(Builder $query, $search){
        if(!is_null($search))
            return $query->whereHas('movie', function($query) use ($search){
                $query->where('title', 'like', "%{$search}%");
            });

        return $query;
    }
}
