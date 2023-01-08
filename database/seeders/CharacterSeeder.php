<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->insert([
            [
                'actor_id' => 1,
                'movie_id' => 1,
                'character_name' => 'Doctor Strange'
            ],
            [
                'actor_id' => 1,
                'movie_id' => 4,
                'character_name' => 'Doctor Strange'
            ],
            [
                'actor_id' => 2,
                'movie_id' => 1,
                'character_name' => 'Wanda Maximoff'
            ],
            [
                'actor_id' => 3,
                'movie_id' => 2,
                'character_name' => 'Black Adam'
            ],
            [
                'actor_id' => 3,
                'movie_id' => 6,
                'character_name' => 'Luke Hobbs'
            ],
            [
                'actor_id' => 4,
                'movie_id' => 3,
                'character_name' => 'Futaro Uesugi'
            ],
            [
                'actor_id' => 5,
                'movie_id' => 4,
                'character_name' => 'Peter Parker'
            ],
            [
                'actor_id' => 6,
                'movie_id' => 5,
                'character_name' => 'Jake Sully'
            ],
            [
                'actor_id' => 7,
                'movie_id' => 5,
                'character_name' => 'Neytiri'
            ],
            [
                'actor_id' => 8,
                'movie_id' => 6,
                'character_name' => 'Deckard Shaw'
            ],
        ]);
    }
}
