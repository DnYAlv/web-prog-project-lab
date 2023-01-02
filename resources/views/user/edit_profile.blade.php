@extends('template')
@section('title', 'Login')
@section('konten')
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-5 text-center">
            <h3>My <span class="text-danger">Profile</span></h3>
            <i class="bi bi-person-circle text-white" style="font-size: 8rem" data-bs-toggle="dropdown" aria-expanded="false"></i>
            <p>{{$user->name}}</p>
            <p class="text-muted">{{$user->email}}</p>
        </div>
        <div class="col">
            <h3 class="text-danger p-2">Update Profile</h3>
            <form class="p-2" enctype="multipart/form-data" action="#" method="post">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text w-25">Username</span>
                    <input type="text" name="username" id="username" class="form-control" value="{{$user->name}}">
                </div>
                @if ($errors->get('username'))
                    <strong> {{ $errors->first('username') }} </strong>
                @endif
                <div class="input-group mb-3">
                    <span class="input-group-text w-25">Email</span>
                    <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                </div>
                @if ($errors->get('email'))
                    <strong> {{ $errors->first('email') }} </strong>
                @endif
                <div class="input-group mb-3">
                    <span class="input-group-text w-25">DOB</span>
                    <input type="text" name="username" id="username" class="form-control" value="{{$user->date_of_birth}}">
                </div>
                @if ($errors->get('username'))
                    <strong> {{ $errors->first('username') }} </strong>
                @endif
                <div class="input-group mb-3">
                    <span class="input-group-text w-25">Phone</span>
                    <input type="email" name="email" id="email" class="form-control" value="{{$user->phone}}">
                </div>
                @if ($errors->get('email'))
                    <strong> {{ $errors->first('email') }} </strong>
                @endif
                <div class="mb-3 d-grid mx-auto">
                    <button class="btn btn-danger" type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
