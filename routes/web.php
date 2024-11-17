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

Route::get('/', function () {
    return view('beranda');
});

Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/tentang-kami', function () {
    return view('tentang-kami');
});

Route::get('/sign-up', function () {
    return view('sign-up');
});

Route::get('/sign-in', function () {
    return view('sign-in');
});
