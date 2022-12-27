<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function home() {
        $movies = Movie::all();
        $genres = Genre::all();

        return view('home', ['movies' => $movies, 'genres' => $genres]);
    }
}
