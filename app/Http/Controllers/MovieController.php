<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Character;
use App\Models\Genre;
use App\Models\GenreMovie;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    public function index(){
        return view('movie.index');
    }

    public function create()
    {
        $actors = Actor::all();
        $genres = Genre::all();

        return view('movie.create_movie', ['actors' => $actors, 'genres' => $genres]);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:2|max:50',
            'description' => 'required|min:8',
            'genre_id' => 'required|array',
            'genre_id.*' => 'required|numeric',
            'actor_id' => 'required|array',
            'actor_id' => 'required|numeric',
            'character_name' => 'required|array',
            'character_name.*' => 'required|string',
            'director' => 'required|min:3',
            'release_date' => 'required|date',
            'image_thumbnail' => 'required|image',
            'background' => 'required|image'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $thumbnail = $request->file('image_thumbnail');
        $extension_thumbnail = $thumbnail->getClientOriginalExtension();
        $file_thumbnail = time() . '.' . $extension_thumbnail;

        $background = $request->file('background');
        $extension_background = $background->getClientOriginalExtension();
        $file_background = time() . '.' . $extension_background;

        Storage::putFileAs('public/images/thumbnail/', $thumbnail, $file_thumbnail);
        Storage::putFileAs('public/images/background/', $background, $file_background);

        $genre_id = $request->genreID;
        $actor_id = $request->actorID;
        $character_names = $request->charNames;

        $movie = Movie::create($request->except(['genre_id', 'actor_id', 'character_name']));

        $genre_data = [];
        foreach ($genre_id as $gid) {
            $genre_data[] = [
                'movie_id' => $movie->id,
                'genre_id' => $gid
            ];
        }
        GenreMovie::insert($genre_data);

        $actor_data = [];
        for ($i = 0; $i < count($actor_id); $i++) {
            $actor_data[] = [
                'movie_id' => $movie->id,
                'actor_id' => $actor_id[$i],
                'character_name' => $character_names[$i]
            ];
        }
        Character::insert($actor_data);

        return redirect('/movies');
    }
}
