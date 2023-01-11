@extends('template')
@section('title', 'Detail Movie')
@section('konten')
<style>
    .carousel-control-prev,
    .carousel-control-next {
        position: absolute;
        width: 30px;
    }

</style>
<div class="card">
    <img src="{{Storage::url('images/background/' . $movie->background)}}" class="card-img opacity-2" alt="...">
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
                <p type="button" class="btn btn-outline-light rounded-pill">
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
                    @php
                        $alreadyAdded = false;
                    @endphp
                    @if (Auth::user()->role == 'user')
                        @foreach ($movie->users as $user)
                            @if ($user->id == Auth::id())
                                @php
                                    $alreadyAdded = true;
                                @endphp
                            @endif
                        @endforeach
                        @if ($alreadyAdded)
                            <form action="/watchlist/delete/{{ $movie->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="id" name="movie_id" value="{{ $movie->id }}">
                                <button class="btn btn-danger mx-2 w-30" type="submit">
                                    <i class="bi-x-lg"></i>
                                    Remove From Watchlist
                                </button>
                            </form>
                        @else
                            <form action="/watchlist/create" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="id" name="movie_id" value="{{ $movie->id }}">
                                <button class="btn btn-primary mx-2 w-30" type="submit">
                                    <i class="bi-plus-lg"></i>
                                    Add to Watchlist
                                </button>
                            </form>
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
            <a href="/actors/detail/{{$a->id}}">
                <img height="360px" src="{{Storage::url('images/actor/' . $a->image_url)}}" class="card-img-top" alt="...">
            </a>
            <div class="card-body bg-danger">
                <h5 class="card-title">{{$a->name}}</h5>
                <p class="card-text">{{$a->pivot->character_name}}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div id="moreMovies" class="carousel slide py-5 p-5" data-bs-ride="true">
    <h3><div class="vr me-2"></div>More</h3>
    <div class="carousel-inner">
        @php
            $countMovies = $movies->count();
            $carouselCount = $countMovies / 5;
        @endphp
        @for ($i = 0; $i < $carouselCount; $i++)
            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                <div class="row">
                    @php
                        $start = $i * 5;
                        $end = 5;
                        $subset = $movies->slice($start, $end);
                    @endphp
                    @foreach ($subset as $movie)
                        <div class="col">
                            <div class="card">
                                <a href="/movies/detail/{{ $movie->id }}">
                                    <img height="360px"
                                        src="{{ Storage::url('images/thumbnail/' . $movie->image_thumbnail) }}"
                                        class="card-img-top" alt="...">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $movie->title }}</h5>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="card-text text-muted">{{ date('Y', strtotime($movie->release_date)) }}
                                        </p>
                                        @auth
                                            @php
                                                $alreadyAdded = false;
                                            @endphp
                                            @if (Auth::user()->role == 'user')
                                                @foreach ($movie->users as $user)
                                                    @if ($user->id == Auth::id())
                                                        @php
                                                            $alreadyAdded = true;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @if ($alreadyAdded)
                                                    <form action="/watchlist/delete/{{ $movie->id }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" id="id" name="movie_id" value="{{ $movie->id }}">
                                                        <button class="btn btn-success mx-2 w-30" type="submit">
                                                            <i class="bi-check-lg"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="/watchlist/create" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" id="id" name="movie_id" value="{{ $movie->id }}">
                                                        <button class="btn btn-primary mx-2 w-30" type="submit">
                                                            <i class="bi-plus-lg"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endfor
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#moreMovies" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#moreMovies" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
{{-- <div class="row p-5">
    <h3><div class="vr me-2"></div>More</h3>
    @foreach ($movies as $m)
        <div class="col">
            <div class="card">
                <a href="/movies/detail/{{$m->id}}">
                    <img height="360px" src="{{Storage::url('images/thumbnail/' . $m->image_thumbnail)}}" class="card-img-top" alt="...">
                </a>
                <div class="card-body bg-black">
                <h5 class="card-title">{{$m->title}}</h5>
                <p class="card-text text-muted">{{date('Y', strtotime($m->release_date))}}</p>
                </div>
            </div>
        </div>
    @endforeach
</div> --}}
@endsection
