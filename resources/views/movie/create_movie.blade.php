@extends('template')
@section('title', 'Login')
@section('konten')

<div class="container-fluid p-5">
    <h1>Add Movie</h1>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Description</label>
        <textarea type="text" class="form-control" id="title" rows="8"></textarea>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title">
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="title" class="form-label" id="actor">Title</label>
            <select class="form-select" aria-label="Default select example" id="actor">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
        </div>
        <div class="col">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title">
        </div>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="date" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="file" class="form-control" id="title">
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="file" class="form-control" id="title">
    </div>
    <div class="pb-3 d-grid mx-auto">
        <input class="btn btn-outline-primary" type="submit" value="Register">
    </div>
</div>
@endsection
