<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/template.css')}}">
</head>
<body>
    <div class="container-fluid p-0" style="">
        <nav class="navbar navbar-expand-lg" style="background-color: #1F1F1F">
            <div class="container-fluid mx-5">
                <a class="navbar-brand text-white" href="#"><span class="text-danger">Movie</span>List</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="/movies/">Movies</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="/actors/">Actors</a>
                    </li>
                    @auth
                    @if (Auth::user()->role == 'user')
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/watchlist">My Watchlist</a>
                    </li>
                    @endif
                    @endauth
                </ul>
                @auth
                    <div class="dropdown mx-2">
                        <i class="bi bi-person-circle text-white" style="font-size: 1.5rem" data-bs-toggle="dropdown" aria-expanded="false"></i>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </div>
                @else
                    <a class="btn btn-primary mx-2" href="/register">Register</a>
                    <a class="btn btn-outline-primary" href="/login">Login</a>
                @endauth
                </div>
            </div>
        </nav>
        <div class="text-white" style="background-color: #121117;">
            @yield('konten')
        </div>
        <footer class="py-3 text-center" style="background-color: #1F1F1F;color: white">
            <h1><span class="text-danger">Movie</span>List</h1>
            <p><span class="text-danger">Movie</span>List is a Website that contains list of movie</p>
            <div class="my-3" style="font-size: 1.5rem">
                <i class="bi bi-twitter mx-2"></i>
                <i class="bi bi-instagram mx-2"></i>
                <i class="bi bi-facebook mx-2"></i>
                <i class="bi bi-whatsapp mx-2"></i>
                <!--
                <i class="bi bi-reddit mx-2"></i>
                -->
                <i class="bi bi-youtube mx-2"></i>
            </div>
            <p>Privacy Policy | Terms of Service | Contact Us | About Us</p>
            <p>Copyright &#169; 2021 <span class="text-danger">Movie</span>List All Rights Reserved</p>
        </footer>
    </div>
</body>
</html>
