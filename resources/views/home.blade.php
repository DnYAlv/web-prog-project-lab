<head>
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>
@extends('template')
@section('title', 'Home')
@section('konten')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        @for ($i = 0; $i < 3; $i++)
            @php($movie = $movies->random())
            <div class="carousel-item {{$i == 0 ? 'active' : ''}}">
                <div style="height: 560px">
                    <img class="w-100" src="{{asset('storage/images/' . $movie->background)}}" alt="...">
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <p>{{$movie->genres->first()->genre_name}} | {{$movie->release_date}}</p>
                    <h3>{{$movie->title}}</h3>
                    <p>{{$movie->description}}</p>
                </div>
            </div>
        @endfor
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <h3>Popular</h3>
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @for ($i = 1; $i <= $movies->count(); $i++)
        <div class="carousel-item {{$i == 1 ? 'active' : ''}}">
            <div class="row">
            @for ($j = 0; $j < 5; $i++, $j++)
                @php($movie = $movies->find($i))
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('storage/images/' . $movie->background)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endfor
            </div>
        </div>
        @endfor
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="row">
    <div class="col">
        <h3>Show</h3>
    </div>
    <div class="col">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
    </div>
  </div>
  <div id="carouselExampleControls" class="carousel slide mx-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        @for ($i = 1; $i <= $genres->count(); $i++)
        <div class="carousel-item {{$i == 1 ? 'active' : ''}}">
            <div class="row">
            @for ($j = 0; $j < 5; $i++, $j++)
                @php($genre = $genres->find($i))
                <div class="col">
                    <button type="button" class="btn btn-primary rounded-pill">
                        {{$genre->genre_name}}
                    </button>
                </div>

            @endfor
            </div>
        </div>
        @endfor
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="row">
    <div class="col">
        <h4>Sort By:</h4>
    </div>
    <div class="col">
        <button type="button" class="btn btn-primary rounded-pill">
            Notifications <span class="badge text-bg-secondary">4</span>
        </button>
    </div>
    <div class="col">
        <button type="button" class="btn btn-primary rounded-pill">
            Notifications <span class="badge text-bg-secondary">4</span>
        </button>
    </div>
    <div class="col">
        <button type="button" class="btn btn-primary rounded-pill">
            Notifications <span class="badge text-bg-secondary">4</span>
        </button>
    </div>
  </div>
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @for ($i = 1; $i <= $movies->count(); $i++)
        <div class="carousel-item {{$i == 1 ? 'active' : ''}}">
            <div class="row">
            @for ($j = 0; $j < 5; $i++, $j++)
                @php($movie = $movies->find($i))
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('storage/images/' . $movie->background)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endfor
            </div>
        </div>
        @endfor
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  @endsection
