@extends('template')
@section('title', 'Create Movie')
@section('konten')

<div class="container-fluid p-5">
    <h1>Add Actor</h1>
    <div class="mb-3">
        <label for="title" class="form-label">Name</label>
        <input type="text" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Gender</label>
        <div id="genders">
            <div class="row mb-3 mx-0">
                <select class="form-select" id="gender" name="gender">
                    <option selected>-- Open this Select Menu --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Biography</label>
        <textarea type="text" class="form-control" id="biography" rows="8"></textarea>
    </div>
    <div class="mb-3">
        <label for="date_of_birth" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
    </div>
    <div class="mb-3">
        <label for="place_of_birth" class="form-label">Place of Birth</label>
        <input type="text" class="form-control" id="place_of_birth">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Image Url</label>
        <input type="file" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="popularity" class="form-label">Popularity</label>
        <input type="number" class="form-control" id="popularity" name="popularity">
    </div>
    <button type="submit" class="btn btn-danger w-25 my-3">Create</button>
</div>
@endsection
