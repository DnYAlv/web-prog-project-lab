<?php

namespace App\Http\Controllers;

use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('user.watchlist', ['watchlists' => $watchlists, 'status_enum' => ['Planned', 'Watching', 'Finished']]);
    }

    public function updateStatus(Request $request, $id){
        if($request->selectedStatus == 'Remove'){
            Watchlist::where('id', $id)->delete();
            return back();
        }

        $watchlist = Watchlist::where('id', $id)->first();
        $watchlist->update([
            'watchlist_status' => $request->selectedStatus
        ]);

        return back();
    }

    public function store(Request $request){
        Watchlist::create([
            'movie_id' => $request->movie_id,
            'user_id' => Auth::id()
        ]);

        return back();
    }

    public function delete($id){
        Watchlist::where('movie_id', $id)->where('user_id', Auth::id())->delete();

        return back();
    }
}
