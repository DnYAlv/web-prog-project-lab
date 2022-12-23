<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function() {
    return view('auth.login');
});

Route::post('/login', [UserController::class, 'login']);
Route::get('/register', function(){
    return view('auth.register');
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logoutUser']);

// Movie
Route::group(['prefix' => 'movies'], function (){
    Route::get('/', [MovieController::class, 'index']);
    Route::get('/create', [MovieController::class, 'create']);
    Route::post('/insert', [MovieController::class, 'store']);
    Route::get('/edit/{id}', [MovieController::class, 'edit']);
    Route::get('/editMovie/{id}', [MovieController::class, 'update']);
    Route::post('/deleteMovie/{id}', [MovieController::class, 'delete']);
});

// Actor
Route::group(['prefix' => 'actors'], function(){
    Route::get('/', [ActorController::class, 'index']);
    Route::get('/create', [Actorcontroller::class, 'create']);
    Route::post('/insert', [ActorController::class, 'store']);
});
