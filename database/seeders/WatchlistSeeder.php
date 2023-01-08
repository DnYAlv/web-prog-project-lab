<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WatchlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('watchlists')->insert([
            'movie_id' => 1,
            'user_id' => 1,
            'watchlist_status' => 'Planned',
        ]);
        DB::table('watchlists')->insert([
            'movie_id' => 2,
            'user_id' => 1,
            'watchlist_status' => 'Watching',
        ]);
        DB::table('watchlists')->insert([
            'movie_id' => 3,
            'user_id' => 1,
            'watchlist_status' => 'Finished',
        ]);
    }
}
