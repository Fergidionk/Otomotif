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
    return view('daftar');
});

Route::get('/masuk', function () {
    return view('masuk');
});

// User Page
Route::get('/', function () {
    return view('beranda');
});

Route::get('/daftar-kursus', function () {
    return view('daftar-kursus');
});

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/kursus', function () {
    return view('kursus');
});

Route::get('/profil-siswa', function () {
    return view('profil-siswa');


// Admin page



});
