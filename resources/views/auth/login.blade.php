@extends('template')
@section('title', 'Login')
@section('konten')
<div class="d-flex justify-content-center align-self-center py-5">
    <form class="m-5" enctype="multipart/form-data" action="/login" method="post">
        @csrf
        <h3 class="text-center my-5">Hello, Welcome back to <span class="text-danger">Movie</span>List</h3>
        <div class="input-group mb-3">
            <span class="input-group-text w-25">Email</span>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value={{ Cookie::get('email') !== null ? Cookie::get('email') : ""}}>
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text w-25">Password</span>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" value={{ Cookie::get('password') !== null ? Cookie::get('password') : ""}}>
        </div>
        @if ($errors->get('password'))
            <h6> {{ $errors->first('password') }} </h6>
        @endif
        <div class=" mb-3">
            <input class="me-2" type="checkbox" name="remember" id="remember" checked={{ Cookie::get('mycookie') !== null}}>Remember Me
        </div>
        <div class="mb-3 d-grid mx-auto">
            <button class="btn btn-danger" type="submit">
                Login
                <i class="bi bi-arrow-right-short"></i>
            </button>
        </div>
        @if( session()->has('error') )
            <strong> {{ session()->get('error') }} </strong>
        @endif
        <p class="mt-3 form-text text-center text-white">Don't Have an account? <a href="/register" class="text-danger">Sign Up Now.</a></p>
    </form>
</div>
@endsection
