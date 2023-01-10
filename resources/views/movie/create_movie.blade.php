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
        <label for="genreArray" class="form-label">Genre</label>
        <div id="genreArray">
            <div class="row mb-3 mx-0 genre-select">
                <select class="form-select" id="genre_1" name="genre_id[]">
                    <option selected="selected" value="">Select an option</option>
                    @foreach ($genres as $g)
                        <option value="{{$g->id}}">{{$g->genre_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @if ($errors->get('genre_id.*'))
            <strong> {{ $errors->first('genre_id.*') }} </strong>
         @endif

        <div class="text-end">
            <button type="button" class="btn btn-danger my-2" id="moregenre">Add More</button>
        </div>

        <!--Actors-->
        <label for="actorArray" class="form-label my-3">Actors</label>
        <div id="actorArray" class="row mb-3">
            <div class="col-md-6 actor-select d-flex flex-column">
                <label for="actor" class="form-label" id="actor">Actor</label>
                <select class="form-select" id="actor_1" name="actor_id[]">
                    <option selected="selected" value=""> -- Open this select menu -- </option>
                    @foreach ($actors as $a)
                        <option value="{{$a->id}}">{{$a->name}}</option>
                    @endforeach
                </select>
                @if ($errors->get('actor_id.*'))
                    <strong> {{ $errors->first('actor_id.*') }} </strong>
                @endif
            </div>

            <div class="col character-input">
                <label for="character_name" class="form-label">Character Name</label>
                <input type="text" class="form-control" id="character_name_1" name="character_name[]">
                @if ($errors->get('character_name.*'))
                    <strong> {{ $errors->first('character_name.*') }} </strong>
                @endif
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
    $(document).ready(function(){
        $("#moregenre").on("click", function() {
            let genre_num = $("#genreArray").find('.genre-select').length + 1;
            let newRow = $(".genre-select").first().clone();
            newRow.find("#genre_1").attr("id", `genre_${genre_num}`);
            var selectedGenres = $('.genre-select select').map(function() {
                return this.value;
            }).get();

            for (var i = 0; i < selectedGenres.length; i++) {
                newRow.find('select option[value="' + selectedGenres[i] + '"]').attr('disabled', true);
            }

            newRow.appendTo("#genreArray");
        });

        $("#moreactor").on("click", function() {
            let actor_num = $("#actorArray").find('.actor-select').length + 1;
            let newRow = $(".actor-select").first().clone();
            let newInput = $(".character-input").first().clone();
            newRow.find("#actor_1").attr("id", `actor_${actor_num}`);
            newRow.find("#actor_1").attr("name", `actor_id[${actor_num}]`);
            newInput.find("#character_name_1").attr("id", `character_name_${actor_num}`);
            newInput.find("#character_name_1").attr("name", `character_name[${actor_num}]`);
            var selectedActors = $('#actorArray .actor-select select').map(function() {
                return this.value;
            }).get();
            for (var i = 0; i < selectedActors.length; i++) {
                newRow.find('select option[value="' + selectedActors[i] + '"]').attr('disabled', true);
            }
            newRow.appendTo("#actorArray");
            newInput.appendTo("#actorArray");
        });

    })
</script>
@endsection
