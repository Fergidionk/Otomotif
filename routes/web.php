<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\UserController;

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
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

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
});

// Admin page

Route::get('/admin/', function () {
    return view('admin/dashboard');
});
Route::get('/admin/siswa', function () {
    return view('admin/siswa');
});
Route::get('/admin/pendaftaran', function () {
    return view('admin/pendaftaran');
});
Route::get('/admin/paket', function () {
    return view('admin/paket');
});
Route::get('/admin/jadwal', function () {
    return view('admin/jadwal');
});
Route::get('/admin/user', function () {
    return view('admin/user');
});

Route::resource('siswa', SiswaController::class);
Route::resource('pendaftaran', PendaftaranController::class);
Route::resource('paket', PaketController::class);
Route::resource('jadwal', JadwalController::class);
Route::resource('users', UserController::class);



