@extends('template')
@section('title', 'Profile')
@section('konten')
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-5 d-flex flex-column align-items-center text-center">
            <h3>My <span class="text-danger">Profile</span></h3>
            <div class="d-flex justify-content-center align-items-center" style="height: 194px; width: 140px" data-bs-toggle="modal" data-bs-target="#exampleModal" role="button">
                <img src="{{ $user->image }}" alt="" class="img-fluid" style="width: 128px; height: 128px;">
            </div>

            <p>{{$user->name}}</p>
            <p class="text-muted">{{$user->email}}</p>
            <!-- Modal -->
            <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Image</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" id="image_profile" name="image" placeholder="Image URL" form="updateProfileForm">
                        <p class="text-muted">Please upload your image to other sources first and Use the URL</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Save changes</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col">
            <h3 class="text-danger p-2">Update Profile</h3>
            <form class="p-2" id="updateProfileForm" enctype="multipart/form-data" action="/profile/update" method="post">
                @csrf
                @method('PUT')
                <div class="input-group mb-3">
                    <span class="input-group-text w-25">Username</span>
                    <input type="text" name="name" id="username" class="form-control" value="{{$user->name}}">
                </div>
                @if ($errors->get('name'))
                    <strong> {{ $errors->first('name') }} </strong>
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
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{$user->date_of_birth}}">
                </div>
                @if ($errors->get('date_of_birth'))
                    <strong> {{ $errors->first('date_of_birth') }} </strong>
                @endif
                <div class="input-group mb-3">
                    <span class="input-group-text w-25">Phone</span>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{$user->phone}}">
                </div>
                @if ($errors->get('phone'))
                    <strong> {{ $errors->first('phone') }} </strong>
                @endif
                <div class="mb-3 d-grid mx-auto">
                    <button class="btn btn-danger" type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
