@extends('template')
@section('title', 'My Watchlist')
@section('konten')
<style>
    .container{
        display: flex;
        justify-content: flex-end;
    }

</style>
    <div class="container-fluid p-5">
        <h2><i class="bi bi-bookmark-fill" style="color: red"></i>My <span class="text-danger">Watchlist</span></h2>
        <form class="d-flex my-5" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" value="{{request('search')}}">
        </form>
        <div class="input-group mb-3 w-25">
            <span class="input-group-text"><i class="bi bi-funnel-fill"></i></span>
            <button class="btn btn-outline-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton">
                All
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="{{route('watchlist', ['watchlist_status' => 'All'])}}">All</a></li>
                <li><a class="dropdown-item" href="{{route('watchlist', ['watchlist_status' => 'Planned'])}}">Planned</a></li>
                <li><a class="dropdown-item" href="{{route('watchlist', ['watchlist_status' => 'Watching'])}}">Watching</a></li>
                <li><a class="dropdown-item" href="{{route('watchlist', ['watchlist_status' => 'Finished'])}}">Finished</a></li>
            </ul>
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
                @foreach ($watchlists as $wl)
                    <tr>
                        <th scope="row" width="196px">
                            <img width="148px" height="148px" src="{{Storage::url('images/thumbnail/' . $wl->movie->image_thumbnail)}}" alt="">
                        </th>
                        <td>{{$wl->movie->title}}</td>
                        @if ($wl->watchlist_status == 'Planned')
                            <td style="color: green;">{{$wl->watchlist_status}}</td>
                        @elseif ($wl->watchlist_status == 'Watching')
                            <td style="color: blue;">{{$wl->watchlist_status}}</td>
                        @elseif ($wl->watchlist_status == 'Finished')
                            <td style="color: yellow;">{{$wl->watchlist_status}}</td>
                        @endif

                        <td>
                            <i class="bi bi-three-dots"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container p-1">
        <div>
            {{ $watchlists->links()}}
        </div>
    </div>
    <script>
        $('.dropdown-menu a').click(function(event) {
            event.preventDefault();
            var buttonText = $(this).text();
            localStorage.setItem("buttonText", buttonText);
            location.href = $(this).attr('href');
        });

        $(document).ready(function() {
            var buttonText = localStorage.getItem("buttonText");
            if (buttonText) {
                $('#dropdownMenuButton').text(buttonText);
            }
        });
    </script>

@endsection
