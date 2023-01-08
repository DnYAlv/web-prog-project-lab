@extends('template')
@section('title', 'Home')
@section('konten')
<div id="header" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#header" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#header" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#header" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        @for ($i = 0; $i < 3; $i++)
            @php($movie = $movies->random())
            <div class="carousel-item {{$i == 0 ? 'active' : ''}}">
                <div style="height: 560px">
                    <img class="w-100 opacity-50" src="{{asset('storage/images/background/' . $movie->background)}}" alt="...">
                </div>
                <div class="carousel-caption text-start w-25 mb-5 pb-5">
                    <div class="">
                        <p>{{$movie->genres->first()->genre_name}} | {{$movie->release_date}}</p>
                        <h3>{{$movie->title}}</h3>
                        <p>{{$movie->description}}</p>
                    </div>

                    @auth
                    @if (Auth::user()->role == 'user')
                        <form action="#" method="post">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{ $movie->id }}">
                            <button class="btn btn-danger mx-2 w-50" type="submit">
                                <i class="bi bi-plus-lg"></i>
                                Add to Watchlists
                            </button>
                        </form>
                    @endif
                    @endauth
                </div>
            </div>
        @endfor
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
  <h3 class="m-3"><i class="bi bi-fire mx-2"></i>Popular</h3>
  <div id="popular" class="carousel slide my-5" data-bs-ride="true">
    <div class="carousel-inner">
        @for ($i = 1; $i <= $movies->count();)
        <div class="carousel-item {{$i == 1 ? 'active' : ''}}">
            <div class="row">
            @for ($j = 0; $j < 5; $i++, $j++)
                @php($movie = $movies->find($i))
                <div class="col">
                    <div class="card">
                        <a href="detail/{{$movie->id}}">
                            <img height="360px" src="{{asset('storage/images/thumbnail/' . $movie->image_thumbnail)}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                        <h5 class="card-title">{{$movie->title}}</h5>
                        <p class="card-text text-muted">{{date('Y', strtotime($movie->release_date))}}</p>
                        </div>
                    </div>
                </div>
            @endfor
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
        @for ($i = 1; $i <= $genres->count(); $i++)
        <div class="carousel-item {{$i == 1 ? 'active' : ''}}">
            <div class="row">
            @for ($j = 0; $j < 5; $i++, $j++)
                @php($genre = $genres->find($i))
                <div class="col">
                    <button type="button" class="btn btn-secondary rounded-pill w-75">
                        {{$genre->genre_name}}
                    </button>
                </div>
            @endfor
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
        @for ($i = 1; $i <= $movies->count();)
        <div class="carousel-item {{$i == 1 ? 'active' : ''}}">
            <div class="row">
            @for ($j = 0; $j < 5; $i++, $j++)
                @php($movie = $movies->find($i))
                <div class="col">
                    <div class="card">
                        <a href="detail/{{$movie->id}}">
                            <img height="360px" src="{{asset('storage/images/thumbnail/' . $movie->image_thumbnail)}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                        <h5 class="card-title">{{$movie->title}}</h5>
                        <p class="card-text text-muted">{{date('Y', strtotime($movie->release_date))}}</p>
                        </div>
                    </div>
                </div>
            @endfor
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

