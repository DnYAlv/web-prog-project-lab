@extends('template')
@section('title', 'Edit Actor')
@section('konten')

<div class="container-fluid p-5">
    <form action="/actors/editActor/{{$actors->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Edit Actor</h1>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$actors->name}}">
            @if ($errors->get('name'))
                <strong> {{ $errors->first('name') }} </strong>
            @endif
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <div id="genders">
                <div class="row mb-3 mx-0">
                    <select class="form-select" id="gender" name="gender">
                        <option value="" selected>-- Open this Select Menu --</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                @if ($errors->get('gender'))
                    <strong> {{ $errors->first('gender') }} </strong>
                @endif
            </div>
        </div>
        <div class="mb-3">
            <label for="biography" class="form-label">Biography</label>
            <textarea type="text" class="form-control" id="biography" rows="8" name="biography"></textarea>
            @if ($errors->get('biography'))
                <strong> {{ $errors->first('biography') }} </strong>
            @endif
        </div>
        <div class="mb-3">
            <label for="date_of_birth" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{$actors->date_of_birth}}">
            @if ($errors->get('date_of_birth'))
                <strong> {{ $errors->first('date_of_birth') }} </strong>
            @endif
        </div>
        <div class="mb-3">
            <label for="place_of_birth" class="form-label">Place of Birth</label>
            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{$actors->place_of_birth}}">
            @if ($errors->get('place_of_birth'))
                <strong> {{ $errors->first('place_of_birth') }} </strong>
            @endif
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Image Url</label>
            <input type="file" class="form-control" id="image_url" name="image_url">
            @if ($errors->get('image_url'))
                <strong> {{ $errors->first('image_url') }} </strong>
            @endif
        </div>
        <div class="mb-3">
            <label for="popularity" class="form-label">Popularity</label>
            <input type="number" class="form-control" id="popularity" name="popularity" value="{{$actors->popularity}}">
            @if ($errors->get('popularity'))
                <strong> {{ $errors->first('popularity') }} </strong>
            @endif
        </div>
        <button type="submit" class="btn btn-danger w-25 my-3">Edit</button>
    </form>
</div>
@endsection
