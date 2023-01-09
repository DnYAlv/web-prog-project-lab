@extends('template')
@section('title', 'My Watchlist')
@section('konten')
    <div class="container-fluid p-5">
        <h2><i class="bi bi-bookmark-fill" style="color: red"></i>My <span class="text-danger">Watchlist</span></h2>
        <form class="d-flex my-5" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        </form>
        <div class="input-group mb-3 w-25">
            <span class="input-group-text"><i class="bi bi-funnel-fill"></i></span>
            <select class="form-select">
                <option selected>All</option>
                <option value="1">Planned</option>
                <option value="2">Watching</option>
                <option value="3">Finished</option>
            </select>
        </div>
        <table class="table text-white text-center">
            <thead>
              <tr>
                <th scope="col">Poster</th>
                <th scope="col">Title</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($watchlists as $watchlists)
                    <tr>
                        <th scope="row" width="196px">
                            <img width="148px" height="148px" src="{{Storage::url('images/thumbnail/' . $watchlists->image_thumbnail)}}" alt="">
                        </th>
                        <td>{{$watchlists->title}}</td>
                        <td>{{$watchlists->pivot->watchlist_status}}</td>
                        <td>
                            <i class="bi bi-three-dots"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>

@endsection
