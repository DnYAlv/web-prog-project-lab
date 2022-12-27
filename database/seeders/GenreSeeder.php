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
            'genre_name' => 'Action',
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Comedy',
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Crime',
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Sci-Fi',
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Drama',
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Westerns',
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Fantasy',
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Horror',
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Romance',
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Thriller',
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Animation',
        ]);
        DB::table('genres')->insert([
            'genre_name' => 'Musical',
        ]);
    }
}
