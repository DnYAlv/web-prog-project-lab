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
        \App\Models\Movie::factory(15)->create();
        $this->call([GenreSeeder::class]);
        \App\Models\GenreMovie::factory(20)->create();
        \App\Models\Actor::factory(13)->create();
        \App\Models\Character::factory(40)->create();
    }
}
