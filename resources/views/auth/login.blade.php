@extends('template')
@section('title', 'Login')
@section('konten')
<div class="d-flex justify-content-center align-self-center">
    <form class="m-5" enctype="multipart/form-data" action="/login" method="post">
        <h3 class="text-black">Hello, Welcome back to <span class="text-danger">Movie</span>List</h3>
        @csrf
        <div class="row g-3 align-items-center mb-3">
            <div class="col-auto">
              <label for="email" class="col-form-label">Email</label>
            </div>
            <div class="col-auto">
              <input type="email" name="email" id="email" class="form-control" placeholder="Enter your username" value={{ Cookie::get('email') !== null ? Cookie::get('email') : ""}}>
            </div>
            @if ($errors->get('email'))
                <h6> {{ $errors->first('email') }} </h6>
            @endif
        </div>
        <div class="row g-3 align-items-center mb-3">
            <div class="col-auto">
              <label for="password" class="col-form-label">Password</label>
            </div>
            <div class="col-auto">
              <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" value={{ Cookie::get('password') !== null ? Cookie::get('password') : ""}}>
            </div>
            @if ($errors->get('password'))
                <h6> {{ $errors->first('password') }} </h6>
            @endif
        </div>
        <div class="mb-3">
            <input class="" type="checkbox" name="remember" id="remember" checked={{ Cookie::get('mycookie') !== null}}>Remember Me
        </div>
        <div class="mb-3 d-grid mx-auto">
            <input class="btn btn-outline-primary" type="submit" value="Login">
        </div>
        @if( session()->has('error') )
            <strong> {{ session()->get('error') }} </strong>
        @endif
        <p class="mt-3 form-text text-center">Don't Have an account? <a href="/register" class="text-danger">Sign Up Now.</a></p>
    </form>
</div>
@endsection
