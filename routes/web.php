<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function(){
    Route::group(['prefix' => 'watchlist'], function(){
        Route::get('/', [WatchlistController::class, 'index'])->name('watchlist');
        Route::post('/create', [WatchlistController::class, 'store']);
        Route::put('/update/{id}', [WatchlistController::class, 'updateStatus']);
        Route::post('/delete/{id}', [WatchlistController::class, 'delete']);
    });

    Route::group(['prefix' => 'profile'], function(){
        Route::get('/', [UserController::class, 'editProfile']);
        Route::put('/update', [UserController::class, 'update']);
    });
});

// Ini intinya gw buat middleware, jadi yg guest ini => if user already logged in, akan ke redirect ke home, trs ke movies
Route::group(['middleware' => ['guest']], function(){
    Route::get('/login', function () {
        return view('auth.login');
    });

    Route::post('/login', [UserController::class, 'login']);

    Route::get('/register', function () {
        return view('auth.register');
    });

    Route::post('/register', [UserController::class, 'register']);
});

// Movie
Route::group(['prefix' => 'movies'], function () {
    Route::get('/', [MovieController::class, 'index'])->name('movies');
    Route::get('/detail/{id}', [MovieController::class, 'movieDetail']);

    // Ini cek kalo admin baru bisa access ini
    Route::group(['middleware' => 'user-role'], function () {
        Route::get('/create', [MovieController::class, 'create']);
        Route::post('/insert', [MovieController::class, 'store']);
        Route::get('/edit/{id}', [MovieController::class, 'edit']);
        Route::post('/editMovie/{id}', [MovieController::class, 'update']);
        Route::get('/deleteMovie/{id}', [MovieController::class, 'delete']);
    });
});

// Actor
Route::group(['prefix' => 'actors'], function () {
    Route::get('/', [ActorController::class, 'index']);
    Route::get('/detail/{id}', [ActorController::class, 'actorDetail']);

    Route::group(['middleware' => 'user-role'], function(){
        Route::get('/create', [Actorcontroller::class, 'create']);
        Route::post('/insert', [ActorController::class, 'store']);
        Route::get('/edit/{id}', [ActorController::class, 'edit']);
        Route::post('/editActor/{id}', [ActorController::class, 'update']);
        Route::get('/deleteActor/{id}', [ActorController::class, 'delete']);
    });
});

Route::get('/', function () {
    return redirect('/login');
})->name('login');

Route::get('/home', function () {
    return redirect('/movies');
});

Route::get('/logout', [UserController::class, 'logoutUser']);
