<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            'title' => 'movie1',
            'description' => 'movie1description',
            'director' => 'movie1director',
            'release_date' => '1/1/2000',
            'image_thumbnail' => 'movie1.png',
            'background' => 'movie1.png'
        ]);
    }
}
