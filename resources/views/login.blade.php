@extends('template')
@section('title', 'Login')
@section('konten')
<form class="bg-light m-5" action="/login" method="post">
    <h3>Hello, welcome back to movie list</h3>
    @csrf
    <div class="mb-3">
        <input class="" type="email" name="email" id="email" placeholder="email" value={{ Cookie::get('mycookie') !== null ? Cookie::get('mycookie') : ""}}>
    </div>
    <div class="mb-3">
        <input class="" type="password" name="password" id="password" placeholder="password">
    </div>
    <div class="mb-3">
        <input class="" type="checkbox" name="remember" id="remember" checked={{ Cookie::get('mycookie') !== null}}>Remember Me
    </div>
    <div class="mb-3">
        <input class="btn btn-outline-primary" type="submit" value="login">
    </div>
</form>
@endsection
