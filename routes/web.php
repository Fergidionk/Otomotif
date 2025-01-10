<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Page
Route::get('/', function () {
    return view('user/beranda');
})->name('beranda');

Route::middleware(['auth'])->group(function(){
    Route::get('/profil-siswa', [SiswaController::class, 'showProfile'])->name('profil.siswa');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/dashboard', DashboardController::class);
    Route::resource('admin/siswa', SiswaController::class);
    Route::resource('admin/pendaftaran', PendaftaranController::class);
    Route::resource('admin/paket', PaketController::class);
    Route::resource('admin/jadwal', JadwalController::class);
    Route::resource('admin/absensi', AbsensiController::class);
    Route::resource('admin/users', UserController::class);
});

Route::get('/daftar-kursus', [PendaftaranController::class, 'create'])->name('daftar.kursus');
Route::post('/daftar-kursus', [PendaftaranController::class, 'store'])->name('daftar.kursus.store');

Route::get('/tentang-kami', function () {
    return view('user/tentang-kami');
})->name('tentang-kami');

Route::get('/kontak', function () {
    return view('user/kontak');
})->name('kontak');

Route::get('/kursus', function () {
    return view('user/kursus');
})->name('kursus');

// Route untuk admin (dilindungi middleware)


// Route untuk user biasa
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');
});

