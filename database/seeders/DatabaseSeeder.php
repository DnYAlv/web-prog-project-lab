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
        $this->call([UserSeeder::class]);
        \App\Models\Movie::factory(30)->create();
        $this->call([GenreSeeder::class]);
        \App\Models\GenreMovie::factory(40)->create();
        \App\Models\Actor::factory(5)->create();
    }
}
