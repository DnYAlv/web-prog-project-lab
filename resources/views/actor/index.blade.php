@extends('template')
@section('title', 'Actors')
@section('konten')
    <div class="row px-5 py-3">
        <div class="col">
            <h3 class="text-danger">Actors</h3>
        </div>
        <div class="col-4 row">
            <div class="col">
                <form role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
            <div class="col-4 text-end">
                <button class="btn btn-danger">Add Actor</button>
            </div>
        </div>
    </div>
    <div class="row px-5">
        @foreach ($actors as $a)
        <div class="col-3 p-3">
            <div class="card">
                <a href="detail/{{$a->id}}" class="m-3">
                    <img height="360px" src="{{asset('storage/images/actor/' . $a->image_url)}}" class="card-img-top" alt="...">
                </a>
                <div class="card-body bg-black">
                <h5 class="card-title">{{$a->name}}</h5>
                @if ($a->movies!=null)
                    <p class="card-text text-muted">{{$a->movies->first()->title}}</p>
                @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection
