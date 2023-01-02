<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function watchlist() {
        $user = Auth::user();
        $watchlists = Watchlist::with('movie')->where('user_id', $user->id)->get();

        return view('user.watchlist', ['watchlists' => $watchlists]);
    }
}
