@extends('template')
@section('title', 'Register')
@section('konten')
<div class="d-flex justify-content-center align-self-center">
    <form class="m-5" enctype="multipart/form-data" action="/register" method="post">
        <h3 class="text-black">Hello, Welcome back to <span class="text-danger">Movie</span>List</h3>
        @csrf
        <div class="row g-3 align-items-center mb-3">
            <div class="col-auto">
              <label for="username" class="col-form-label">Username</label>
            </div>
            <div class="col-auto">
              <input type="username" name="name" id="name" class="form-control" placeholder="Enter your username">
            </div>
            @if ($errors->get('name'))
                <strong> {{ $errors->first('name') }} </strong>
            @endif
        </div>
        <div class="row g-3 align-items-center mb-3">
            <div class="col-auto">
              <label for="email" class="col-form-label">Email</label>
            </div>
            <div class="col-auto">
              <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
            </div>
            @if ($errors->get('email'))
                <strong> {{ $errors->first('email') }} </strong>
            @endif
        </div>
        <div class="row g-3 align-items-center mb-3">
            <div class="col-auto">
              <label for="password" class="col-form-label">Password</label>
            </div>
            <div class="col-auto">
              <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
            </div>
            @if ($errors->has('password'))
                <strong> {{ $errors->first('password') }} </strong>
            @endif
        </div>
        <div class="row g-3 align-items-center mb-3">
            <div class="col-auto">
              <label for="password" class="col-form-label">Confirm Password</label>
            </div>
            <div class="col-auto">
              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm password">
            </div>
        </div>
        <div class="mb-3 d-grid mx-auto">
            <input class="btn btn-outline-primary" type="submit" value="Register">
        </div>
        <p class="mt-3 form-text text-center">Already have an account? <a href="/login" class="text-danger">Sign In Now.</a></p>
    </form>
    {{-- @if ($errors->any())
        {{$errors->first()}}
    @endif --}}
</div>
@endsection