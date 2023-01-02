<?php

namespace Database\Factories;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class GenreMovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genreCount = Genre::count();
        $movieCount = Movie::count();
        static $count = 0;
        if($count>=$movieCount) {
            $count=0;
        }
        return [
            'genre_id' => rand(1, $genreCount),
            'movie_id' => ++$count,
        ];
    }
}
