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
      <div class="carousel-item active">
        <div style="height: 560px">
            <img class="w-100" src="{{asset('storage/images/movie1.png')}}" alt="...">
        </div>
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <div style="height: 560px">
            <img class="w-100" src="{{asset('storage/images/movie2.png')}}" alt="...">
        </div>
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <div style="height: 560px">
            <img class="w-100" src="{{asset('storage/images/movie3.png')}}" alt="...">
        </div>
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
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
      <div class="carousel-item active">
        <div class="row">
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('storage/images/movie1.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{asset('storage/images/movie3.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{asset('storage/images/movie1.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{asset('storage/images/movie3.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="{{asset('storage/images/movie3.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
            </div>
        </div>

      </div>
      <div class="carousel-item">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/images/movie3.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
      </div>
      <div class="carousel-item">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/images/movie4.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
      </div>
      <div class="carousel-item">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/images/movie3.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
      </div>
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
      <div class="carousel-item active">
        <button type="button" class="btn btn-primary rounded-pill">
            Notifications <span class="badge text-bg-secondary">4</span>
        </button>
        <button type="button" class="btn btn-primary rounded-pill">
            Notifications <span class="badge text-bg-secondary">4</span>
        </button>
        <button type="button" class="btn btn-primary rounded-pill">
            Notifications <span class="badge text-bg-secondary">4</span>
        </button>
        <button type="button" class="btn btn-primary rounded-pill">
            Notifications <span class="badge text-bg-secondary">4</span>
        </button>
        <button type="button" class="btn btn-primary rounded-pill">
            Notifications <span class="badge text-bg-secondary">4</span>
        </button>
        <button type="button" class="btn btn-primary rounded-pill">
            Notifications <span class="badge text-bg-secondary">4</span>
        </button>
      </div>
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
  <div class="row">
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/images/movie1.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/images/movie1.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/images/movie1.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/images/movie1.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/images/movie1.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/images/movie1.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/images/movie1.png')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
  </div>
  @endsection
