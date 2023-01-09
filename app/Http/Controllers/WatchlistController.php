<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchlistController extends Controller
{
    public function index() {
        $user = Auth::user();
        $watchlists = $user->movies;

        return view('user.watchlist', ['watchlists' => $watchlists]);
    }

    public function store(Request $request){
        Watchlist::create([
            'movie_id' => $request->movie_id,
            'user_id' => Auth::id()
        ]);

        return redirect('/movies');
    }

    public function delete($id){
        Watchlist::where('movie_id', $id)->where('user_id', Auth::id())->delete();

        return redirect()->back();
    }
}
