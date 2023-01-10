@extends('template')
@section('title', 'Home')
@section('konten')
<style>
    .carousel-control-prev,
    .carousel-control-next {
        position: absolute;
        width: 30px;
    }

</style>
    {{-- Carousel 3 Random Images --}}
    <div id="header" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#header" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#header" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#header" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @php
                $shuffledMovies = $movies->shuffle();
                $randomMovies = $shuffledMovies->take(3);
            @endphp
            @foreach ($randomMovies as $i => $movie)
                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                    <div style="height: 560px">
                        <img class="w-100 opacity-50" src="{{ Storage::url('images/background/' . $movie->background) }}"
                            alt="...">
                    </div>
                    <div class="carousel-caption text-start w-25 mb-5 pb-5">
                        <div class="">
                            <p>{{ $movie->genres->first()->genre_name }} | {{ $movie->release_date }}</p>
                            <h3>{{ $movie->title }}</h3>
                            <p>{{ $movie->description }}</p>
                        </div>

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
                                        <button class="btn btn-success mx-2 w-50" type="submit">
                                            <i class="bi bi-check-lg"></i>
                                            Already Added
                                        </button>
                                    </form>
                                @else
                                    <form action="/watchlist/create" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" id="id" name="movie_id" value="{{ $movie->id }}">
                                        <button class="btn btn-primary mx-2 w-50" type="submit">
                                            <i class="bi bi-plus-lg"></i>
                                            Add to Watchlists
                                        </button>
                                    </form>
                                @endif
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

{{-- Popular Section --}}
    <h3 class="m-3"><i class="bi bi-fire mx-2"></i>Popular</h3>
    <div id="popular" class="carousel slide my-5" data-bs-ride="true">
        <div class="carousel-inner">
            @php
                $countMovies = $movies->count();
                $carouselCount = $countMovies / 5;
            @endphp
            @for ($i = 0 ; $i < $carouselCount ; $i++)
                <div class="carousel-item {{$i == 0 ? 'active' : ''}}">
                    <div class="row">
                        @php
                            $start = $i * 5;
                            $end = $start + 5;
                            $subset = $movies->slice($start, $end);
                        @endphp
                        @foreach ($subset as $movie)
                            <div class="col">
                                <div class="card">
                                    <a href="/movies/detail/{{$movie->id}}">
                                        <img height="360px" src="{{Storage::url('images/thumbnail/' . $movie->image_thumbnail)}}" class="card-img-top" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$movie->title}}</h5>
                                        <p class="card-text text-muted">{{date('Y', strtotime($movie->release_date))}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endfor
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#popular" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#popular" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

{{-- Show Section --}}
<div class="row m-3">
    <div class="col">
        <h3><i class="bi bi-film mx-2"></i>Show</h3>
    </div>
    <div class="col-3">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        </form>
    </div>
</div>
<hr>
<div id="genre" class="carousel slide m-5" data-bs-interval="true">
    <div class="carousel-inner">
        @php
            $countGenres = $genres->count();
            // $carouselCount = $countGenres / 6;
        @endphp
        @for ($i = 0; $i < $countGenres; $i++)
            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                <div class="row">
                    @php
                        // $start = $i * 6;
                        // $end = $start + 6;
                        $subset = $genres->slice(0, $countGenres);
                    @endphp
                    @foreach ($subset as $genre)
                        <div class="col">
                            <button type="button" class="btn btn-secondary rounded-pill w-75">
                                {{ $genre->genre_name }}
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        @endfor
    </div>
</div>
<div class="row w-25 m-3">
    <div class="col-3 m-0">
        <h5 class="my-1">Sort By:</h5>
    </div>
    <div class="col">
        <button type="button" class="btn btn-secondary rounded-pill w-100">
            Latest
        </button>
    </div>
    <div class="col">
        <button type="button" class="btn btn-secondary rounded-pill w-100">
            A-Z
        </button>
    </div>
    <div class="col">
        <button type="button" class="btn btn-secondary rounded-pill w-100">
            Z-A
        </button>
    </div>
</div>

@auth
    @if (Auth::user()->role == 'admin')
        <div class="text-end mx-5">
            <a class="btn btn-danger" href="/movies/create">
                <i class="bi bi-plus-lg"></i>
                Add Movie
            </a>
        </div>
    @endif
@endauth
<div id="show" class="carousel slide py-5" data-bs-ride="true">
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
                        $end = $start + 5;
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
    <button class="carousel-control-prev" type="button" data-bs-target="#show" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#show" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection
