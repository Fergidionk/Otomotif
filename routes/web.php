<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// authentication
Route::get('/daftar', function () {
    return view('authentication/daftar');
});

Route::get('/masuk', function () {
    return view('authentication/masuk');
});

// User Page
Route::get('/', function () {
    return view('user/beranda');
});

Route::get('/daftar-kursus', function () {
    return view('user/daftar-kursus');
});

Route::get('/tentang-kami', function () {
    return view('user/tentang-kami');
});

Route::get('/kontak', function () {
    return view('user/kontak');
});

Route::get('/kursus', function () {
    return view('user/kursus');
});

Route::get('/profil-siswa', function () {
    return view('user/profil-siswa');


// Admin page



});
