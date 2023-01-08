@extends('template')
@section('title', 'Create Movie')
@section('konten')

<div class="container-fluid p-5">
    <div class="row text-danger" style="margin-top: -2rem;">
        @if ($errors->any())
        <h4>Error</h4>
        <ul class="ps-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form action="/movies/insert" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Add Movie</h1>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" rows="8"></textarea>
        </div>
        <label for="title" class="form-label">Genre</label>
        <div id="genres">
            <div class="row mb-3 mx-0">
                <select class="form-select" id="genre" name="genre_id[]">
                    <option selected>Select an option</option>
                    @foreach ($genres as $g)
                        <option value="{{$g->id}}">{{$g->genre_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="text-end">
            <button class="btn btn-danger my-2" id="moregenre">Add More</button>
        </div>

        <label for="actors" class="form-label my-3">Actors</label>
        <div id="actors">
            <div class="row mb-3">
                <div class="col">
                    <label for="actor" class="form-label" id="actor">Actor</label>
                    <select class="form-select" id="actor">
                        <option selected> -- Open this select menu -- </option>
                        @foreach ($actors as $a)
                            <option value="{{$a->id}}">{{$a->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="character_name" class="form-label">Character Name</label>
                    <input type="text" class="form-control" id="character_name[]">
                </div>
            </div>
        </div>
        <div class="text-end">
            <button class="btn btn-danger my-2" id="moreactor">Add More</button>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Director</label>
            <input type="text" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Release Date</label>
            <input type="date" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Image Url</label>
            <input type="file" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Background Url</label>
            <input type="file" class="form-control" id="title">
        </div>
        <button type="submit" class="btn btn-danger w-100 my-3">Create</button>
    </form>
</div>
<script>
    $("#moregenre").click(function() {
        var selectedGenres = $('select[id="genre"]').map(function() {
            return this.value;
        }).get();
        $('#genres').append(`
            <div class="row mb-3">
                <div class="col">
                    <select class="form-select" id="genre" name="genre_id[]">
                        <option selected>Select an option</option>
                        @foreach ($genres as $g)
                            <option value="{{$g->id}}">{{$g->genre_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        `);
        for (var i = 0; i < selectedGenres.length; i++) {
            $('#genres').find('option[value="' + selectedGenres[i] + '"]').attr('disabled', true);
        }
    });

    $("#moreactor").click(function() {
        var selectedActors = $('select[id="actor"]').map(function() {
            return this.value;
        }).get();
        $('#actors').append(`
            <div class="row mb-3">
                <div class="col">
                    <label for="actor" class="form-label" id="actor">Actor</label>
                    <select class="form-select" id="actor">
                        <option selected> -- Open this select menu -- </option>
                        @foreach ($actors as $a)
                            <option value="{{$a->id}}">{{$a->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label for="character_name" class="form-label">Character Name</label>
                    <input type="text" class="form-control" id="character_name[]">
                </div>
            </div>
        `);
        for (var i = 0; i < selectedActors.length; i++) {
            $('#actors').find('option[value="' + selectedActors[i] + '"]').attr('disabled', true);
        }
    });
</script>
@endsection
