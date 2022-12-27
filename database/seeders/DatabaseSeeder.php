<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Movie::factory(30)->create();
        $this->call([GenreSeeder::class]);
        \App\Models\GenreMovie::factory(40)->create();
        /*$this->call([MovieSeeder::class]);*/
    }
}
