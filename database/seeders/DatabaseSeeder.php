<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            MovieSeeder::class,
            GenreSeeder::class,
            GenreMoviesSeeder::class,
            ActorSeeder::class,
            CharacterSeeder::class,
            WatchlistSeeder::class
        ]);
    }
}
