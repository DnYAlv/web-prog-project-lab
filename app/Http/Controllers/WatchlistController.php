<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function watchlist() {
        $movies = Auth::user()->movies;

        return view('user.watchlist', ['movies' => $movies]);
    }
}
