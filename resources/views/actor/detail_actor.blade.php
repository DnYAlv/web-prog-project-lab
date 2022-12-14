@extends('template')
@section('title', 'Actor Detail')
@section('konten')
    <div class="container-fluid p-5">
        @if (session()->has('error'))
            <strong> {{ session()->get('error') }} </strong>
        @endif
        <div class="row">
            <div class="col-3">
                <div class="position-relative">
                    <img height="360px" src="{{ Storage::url('images/actor/' . $actor->image_url) }}"
                        class="card-img-top bg-black p-2 opacity-75" alt="...">
                    @auth
                        @if (Auth::user()->role == 'admin')
                            <div class="col position-absolute top-0 end-0 mx-3">
                                <div class="bg-danger rounded-circle p-1 my-2">
                                    <a href="{{ url('actors/edit/' . $actor->id) }}" class="bi bi-pencil-square ms-3 text-white"
                                        style="font-size: 1.8em"></a>
                                </div>
                                <div class="bg-danger rounded-circle">
                                    <a href="/actors/deleteActor/{{ $actor->id }}" class="btn bi bi-trash3 mx-2 text-white" style="font-size: 1.8em"></a>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>

                <h3>Personal Info</h3>
                <h5>Popularity</h5>
                <p class="text-muted">{{ $actor->popularity }}</p>
                <h5>Gender</h5>
                <p class="text-muted">{{ $actor->gender }}</p>
                <h5>Birthday</h5>
                <p class="text-muted">{{ $actor->date_of_birth }}</p>
                <h5>Place of Birth</h5>
                <p class="text-muted">{{ $actor->place_of_birth }}</p>
            </div>
            <div class="col row">
                <h2>{{ $actor->name }}</h2>
                <h4>Biography</h4>
                <p>{{ $actor->biography }}</p>
                <h4>Known For</h4>
                @foreach ($actor->movies as $m)
                    <div class="col-3 p-3">
                        <div class="card bg-dark">
                            <a href="/movies/detail/{{ $m->id }}" class="m-3">
                                <img height="360px" src="{{ Storage::url('images/thumbnail/' . $m->image_thumbnail) }}"
                                    class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $m->title }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
