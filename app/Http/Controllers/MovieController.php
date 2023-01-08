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
        $movies = Movie::all();
        $genres = Genre::all();

        return view('movie.index', ['movies' => $movies, 'genres' => $genres]);
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
            'actor_id.*' => 'required|numeric',
            'character_name' => 'required|array',
            'character_name.*' => 'required|string',
            'director' => 'required|min:3',
            'release_date' => 'required|date',
            'image_thumbnail' => 'required|image',
            'background' => 'required|image'
        ];

        $messages = [
            'genre_id.*.array' => "The Genre Field is Required."
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $thumbnail = $request->file('image_thumbnail');
        $extension_thumbnail = $thumbnail->getClientOriginalExtension();
        $file_thumbnail = 'img_thumb'.time() . '.' . $extension_thumbnail;

        $background = $request->file('background');
        $extension_background = $background->getClientOriginalExtension();
        $file_background = 'img_bg'.time() . '.' . $extension_background;

        Storage::putFileAs('public/images/thumbnail/', $thumbnail, $file_thumbnail);
        Storage::putFileAs('public/images/background/', $background, $file_background);

        $genre_id = $request->genreID;
        $actor_id = $request->actorID;
        $character_names = $request->charNames;

        $data = $request->except(['genre_id', 'actor_id', 'character_name']);
        $data['image_thumbnail'] = $file_thumbnail;
        $data['background'] = $file_background;

        $movie = Movie::create($data);

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

    public function movieDetail($id){
        $movie = Movie::where('id', $id)->first();
        //Need to show more movies, so added a variable to store all Movie data
        $movies = Movie::all();

        return view('movie.detail_movie', ['movie' => $movie, 'movies' => $movies]);
    }

    public function edit($id){
        $actors = Actor::all();
        $genres = Genre::all();
        $movie = Movie::with([
            'genres',
            'actors'
        ])->find($id);

        return view('movie.edit_movie', ['actors' => $actors, 'genres' => $genres, 'movie' => $movie]);
    }

    public function update(Request $request, $id){
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
            'image_thumbnail' => 'image',
            'background' => 'image'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $data = $request->except(['genre_id', 'actor_id', 'character_name']);

        $genre_id = $request->genreID;
        $actor_id = $request->actorID;
        $character_names = $request->charNames;

        $movie = Movie::where('id', $id)->first();

        GenreMovie::where('movie_id', $id)->delete();
        Character::where('movie_id', $id)->delete();

        if($request->file('image_thumbnail')){
            Storage::delete('public/images/thumbnail/'.$movie->image_thumbnail);
            $thumbnail = $request->file('image_thumbnail');
            $extension_thumbnail = $thumbnail->getClientOriginalExtension();
            $file_thumbnail = 'img_thumb'.time() . '.' . $extension_thumbnail;
            Storage::putFileAs('public/images/thumbnail/', $thumbnail, $file_thumbnail);
            $data['image_thumbnail'] = $file_thumbnail;
        }

        if($request->file('background')){
            Storage::delete('public/images/thumbnail/'.$movie->background);
            $background = $request->file('background');
            $extension_background = $background->getClientOriginalExtension();
            $file_background = 'img_bg'.time() . '.' . $extension_background;
            Storage::putFileAs('public/images/background/', $background, $file_background);
            $data['background'] = $file_background;
        }

        $movie->update($data);

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

        return redirect('/movies/'.$movie->id);
    }

    public function delete($id){
        $movie = Movie::where('id', $id)->first();

        Storage::delete('public/images/thumbnail/'.$movie->image_thumbnail);
        Storage::delete('public/images/thumbnail/'.$movie->background);

        GenreMovie::where('movie_id', $movie->id)->delete();
        Character::where('movie_id', $movie->id)->delete();

        Movie::where('id', $id)->delete();

        return redirect('/movies');
    }
}
