<?php

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
    return view('login');
});

Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'loginUser']);

Route::post('/logout', [UserController::class, 'logoutUser']);

//latihan
// Route::get('/mahasiswa/{nama}', function($nama){
//     return "Tampilkan data mahasiswa bernama $nama";
// });

// Route::get('/hubungi-kami', function(){
//     return '<h1>hubungi kami</h1>';
// });

// Route::redirect('/contact-us', '/hubungi-kami');

// Route::prefix('/admin')->group(function (){

//     Route::get('/mahasiswa', function (){
//         echo "<h1>Daftar mahasiswa</h1>";
//     });

//     Route::get('/dosen', function (){
//         echo "<h1>Daftar Dosen</h1>";
//     });

//     Route::get('/karyawan', function (){
//         echo "<h1>Daftar Karyawan</h1>";
//     });

// });

// Route::get('/buku/1', function (){
//     return "Buku ke-1";
// });

// Route::get('/buku/1', function (){
//     return "Buku saya ke-1";
// });

// Route::get('/buku/1', function (){
//     return "Buku saya ke-1";
// });

// Route::get('/buku/{a}', function ($a) {
//     return "Buku ke-$a";
// });

// Route::get('/buku/{b}', function ($b) {
//     return "Buku ke-$b";
// });

// Route::get('/buku/{c}', function ($c) {
//     return "Buku ke-$c";
// });


