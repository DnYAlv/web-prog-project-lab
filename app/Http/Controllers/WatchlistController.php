<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WatchlistController extends Controller
{
    public function index(Request $request) {
        $watchlist_status = $request->query('watchlist_status', '');
        $search = $request->query('search', '');
        $watchlists = Watchlist::with('movie')
            ->where('user_id', Auth::id())
            ->withWatchlistStatus($watchlist_status)
            ->withSearch($search)
            ->paginate(5);
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
