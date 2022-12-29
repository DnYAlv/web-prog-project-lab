@extends('template')
@section('title', 'Register')
@section('konten')
<div class="d-flex justify-content-center align-self-center">
    <form class="m-5" enctype="multipart/form-data" action="/register" method="post">
        <h3 class="text-center my-5">Hello, Welcome back to <span class="text-danger">Movie</span>List</h3>
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text w-25">Username</span>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username">
        </div>
        @if ($errors->get('username'))
            <strong> {{ $errors->first('username') }} </strong>
        @endif
        <div class="input-group mb-3">
            <span class="input-group-text w-25">Email</span>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
        </div>
        @if ($errors->get('email'))
            <strong> {{ $errors->first('email') }} </strong>
        @endif
        <div class="input-group mb-3">
            <span class="input-group-text w-25">Password</span>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
        </div>
        @if ($errors->get('password'))
            <strong> {{ $errors->first('password') }} </strong>
        @endif
        <div class="input-group mb-3">
            <span class="input-group-text">Confirm Password</span>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter your confirm password">
        </div>
        @if ($errors->get('email'))
            <strong> {{ $errors->first('email') }} </strong>
        @endif
        <div class="mb-3 d-grid mx-auto">
            <button class="btn btn-danger" type="submit">
                Register
                <i class="bi bi-arrow-right-short"></i>
            </button>
        </div>
        <p class="mt-3 form-text text-center">Already have an account? <a href="/login" class="text-danger">Sign In Now.</a></p>
    </form>
    {{-- @if ($errors->any())
        {{$errors->first()}}
    @endif --}}
</div>
@endsection
