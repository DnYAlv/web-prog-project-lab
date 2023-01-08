@extends('template')
@section('title', 'Login')
@section('konten')
<div class="card">
    <img src="{{Storage::url('images/background/' . $movie->background)}}" class="card-img opacity-75" alt="...">
    <div class="row card-img-overlay p-5">
        <div class="col-4">
            <img class="w-100" src="{{Storage::url('images/thumbnail/' . $movie->image_thumbnail)}}" class="card-img" alt="...">
        </div>
        <div class="col mx-5">
            <div class="row">
                <div class="col">
                    <h1 class="card-title">{{$movie->title}}</h1>
                </div>
                @auth
                    @if (Auth::user()->role == 'admin')
                        <div class="col d-flex align-items-center justify-content-end">
                            <a href="/movies/edit/{{$movie->id}}" class="bi bi-pencil-square mx-2 text-white" style="font-size: 1.8em"></a>
                            <a href="/movies/deleteMovie/{{$movie->id}}" class="bi bi-trash3 mx-2 text-white" style="font-size: 1.8em"></a>
                        </div>
                    @endif
                @endauth

            </div>

            @foreach ($movie->genres as $g)
                <p type="button" class="btn btn-outline-secondary rounded-pill">
                    {{$g->genre_name}}
                </p>
            @endforeach
            <div class="me-5">
                <h5>Release Year</h5>
                <p>{{date('Y', strtotime($movie->release_date))}}</p>
                <h3>Storyline</h3>
                <p>{{$movie->description}}</p>
                <h3>Director</h3>
                <p>{{$movie->director}}</p>
                @auth
                    @if (Auth::user()->role == 'user')
                        @if (true)
                            <a href="#" class="btn btn-danger mx-2 w-50">
                                <i class="bi bi-plus-lg"></i>
                                Add to Watchlists
                            </a>
                        @else
                            <a href="#" class="btn btn-danger mx-2 w-50">
                                <i class="bi bi-x-lg"></i>
                                Remove from Watchlists
                            </a>
                        @endif

                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
<div class="row p-5">
    <h3><div class="vr me-2"></div>Cast</h3>
    @foreach ($movie->actors as $a)
    <div class="col-3">
        <div class="card">
            <a href="/movies/detail/{{$a->id}}">
                <img height="360px" src="{{Storage::url('images/actor/' . $a->image_url)}}" class="card-img-top" alt="...">
            </a>
            <div class="card-body bg-danger">
            <h5 class="card-title">{{$a->name}}</h5>
            <p class="card-text text-muted">{{$a->pivot}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row p-5">
    <h3><div class="vr me-2"></div>More</h3>
    @for ($i=0; $i<5; ++$i)
    @php($m = $movies->random())
    <div class="col">
        <div class="card">
            <a href="/movies/detail/{{$m->id}}">
                <img height="360px" src="{{asset('storage/images/thumbnail/' . $m->image_thumbnail)}}" class="card-img-top" alt="...">
            </a>
            <div class="card-body bg-black">
            <h5 class="card-title">{{$m->title}}</h5>
            <p class="card-text text-muted">{{date('Y', strtotime($m->release_date))}}</p>
            </div>
        </div>
    </div>
    @endfor
</div>
@endsection
