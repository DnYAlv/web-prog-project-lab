<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            [
                'genre_name' => 'Action'
            ],
            [
                'genre_name' => 'Comedy'
            ],
            [
                'genre_name' => 'Crime'
            ],
            [
                'genre_name' => 'Sci-Fi'
            ],
            [
                'genre_name' => 'Drama'
            ],
            [
                'genre_name' => 'Westerns'
            ],
            [
                'genre_name' => 'Fantasy'
            ],
            [
                'genre_name' => 'Horror'
            ],
            [
                'genre_name' => 'Romance'
            ],
            [
                'genre_name' => 'Thriller'
            ],
            [
                'genre_name' => 'Animation'
            ],
            [
                'genre_name' => 'Musical'
            ],
            [
                'genre_name' => 'Adventure'
            ],
        ]);
    }
}
