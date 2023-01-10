@extends('template')
@section('title', 'Create Movie')
@section('konten')

<div class="container-fluid p-5">
    <form action="/movies/insert" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Add Movie</h1>
        <!--Title-->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        @if ($errors->get('title'))
            <strong> {{ $errors->first('title') }} </strong>
        @endif

        <!--Description-->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" class="form-control" id="description" rows="8" name="description"></textarea>
        </div>
        @if ($errors->get('description'))
            <strong> {{ $errors->first('description') }} <br></strong>
        @endif

        <!--Genres-->
        <label for="genres" class="form-label">Genre</label>
        <div id="genres">
            <div class="row mb-3 mx-0">
                <select class="form-select" id="genre" name="genre_id[]">
                    <option selected value="">Select an option</option>
                    @foreach ($genres as $g)
                        <option value="{{$g->id}}">{{$g->genre_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @if ($errors->get('genre_id.*'))
            <strong> {{$errors->first('genre_id.*')}} </strong>
        @endif

        <div class="text-end">
            <button type="button" class="btn btn-danger my-2" id="moregenre">Add More</button>
        </div>

        <!--Actors-->
        <label for="actors" class="form-label my-3">Actors</label>
        <div id="actors">
            <div class="row mb-3">
                <div class="col">
                    <label for="actor" class="form-label" id="actor">Actor</label>
                    <select class="form-select" id="actor" name="actor_id[]">
                        <option selected value=""> -- Open this select menu -- </option>
                        @foreach ($actors as $a)
                            <option value="{{$a->id}}">{{$a->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->get('actor_id.*'))
                        <strong> {{ $errors->first('actor_id.*') }} </strong>
                    @endif
                </div>

                <div class="col">
                    <label for="character_name" class="form-label">Character Name</label>
                    <input type="text" class="form-control" id="character_name" name="character_name[]">
                    @if ($errors->get('character_name.*'))
                        <strong> {{ $errors->first('character_name.*') }} </strong>
                    @endif
                </div>
            </div>
        </div>

        <div class="text-end">
            <button type="button" class="btn btn-danger my-2" id="moreactor">Add More</button>
        </div>

        <!--Director-->
        <div class="mb-3">
            <label for="director" class="form-label">Director</label>
            <input type="text" class="form-control" id="director" name="director">
        </div>
        @if ($errors->get('director'))
            <strong> {{ $errors->first('director') }} </strong>
        @endif

        <!--Release Date-->
        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" class="form-control" id="release_date" name="release_date">
        </div>
        @if ($errors->get('release_date'))
            <strong> {{ $errors->first('release_date') }} </strong>
        @endif

        <!--Image Thumbnail-->
        <div class="mb-3">
            <label for="image_thumbnail" class="form-label">Image Url</label>
            <input type="file" class="form-control" id="image_thumbnail" name="image_thumbnail">
        </div>
        @if ($errors->get('image_thumbnail'))
            <strong> {{ $errors->first('image_thumbnail') }} </strong>
        @endif

        <!--Background-->
        <div class="mb-3">
            <label for="background" class="form-label">Background Url</label>
            <input type="file" class="form-control" id="background" name="background">
        </div>
        @if ($errors->get('background'))
            <strong> {{ $errors->first('background') }} </strong>
        @endif
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
