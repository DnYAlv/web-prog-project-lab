@extends('template')
@section('title', 'Actor Detail')
@section('konten')
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-3">
            <img height="360px" src="{{asset('storage/images/actor/' . $actor->image_url)}}" class="card-img-top" alt="...">
            <h3>Personal Info</h3>
            <h5>Popularity</h5>
            <p class="text-muted">{{$actor->popularity}}</p>
            <h5>Gender</h5>
            <p class="text-muted">{{$actor->gender}}</p>
            <h5>Birthday</h5>
            <p class="text-muted">{{$actor->date_of_birth}}</p>
            <h5>Place of Birth</h5>
            <p class="text-muted">{{$actor->place_of_birth}}</p>
        </div>
        <div class="col row">
            <h2>{{$actor->name}}</h2>
            <h4>Biography</h4>
            <p>{{$actor->biography}}</p>
            <h4>Known For</h4>
            @foreach ($actor->movies as $m)
                <div class="col-3 p-3">
                    <div class="card bg-dark">
                        <a href="detail/{{$m->id}}" class="m-3">
                            <img height="360px" src="{{asset('storage/images/thumbnail/' . $m->image_thumbnail)}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{$m->title}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
