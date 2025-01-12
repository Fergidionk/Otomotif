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
use App\Http\Controllers\ProfilSiswaController;
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

// User Pages

// Beranda
Route::get('/', function () {
    return view('user.beranda'); // Perbaikan path view
})->name('beranda');

// Daftar Kursus
Route::middleware(['auth'])->group(function () {
    Route::get('/daftar-kursus', [App\Http\Controllers\PendaftaranController::class, 'create'])
        ->name('daftar.kursus');
    Route::post('/daftar-kursus/store', [App\Http\Controllers\PendaftaranController::class, 'store'])
        ->name('daftar.kursus.store');
});

// Tentang Kami
Route::get('/tentang-kami', function () {
    return view('user.tentang-kami');
})->name('tentang.kami');

// Kontak
Route::get('/kontak', function () {
    return view('user.kontak');
})->name('kontak');

// Profil Siswa
Route::middleware(['auth'])->group(function () {
    Route::get('/profil-siswa', [ProfilSiswaController::class, 'index'])->name('profil.siswa');
});

// Admin Pages (Protected by 'auth' and 'admin' middleware)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');  
    // Siswa
    Route::resource('siswa', SiswaController::class);
    // Pendaftaran
    Route::resource('pendaftaran', App\Http\Controllers\PendaftaranController::class);
    // Paket
    Route::resource('paket', PaketController::class);
    // Jadwal
    Route::get('jadwal/detail/{pendaftar}', [JadwalController::class, 'getJadwalByPendaftar']);
    Route::post('/jadwal/create-empty/{pendaftarId}', [JadwalController::class, 'createEmptyJadwal'])->name('jadwal.create-empty');
    Route::put('jadwal/bulk-update/{pendaftar}', [JadwalController::class, 'bulkUpdate']);
    Route::resource('jadwal', JadwalController::class);
    // Absensi
    Route::get('absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::get('absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('absensi/{absensi}', [AbsensiController::class, 'show'])->name('absensi.show');
    Route::get('absensi/{absensi}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
    Route::put('absensi/{absensi}', [AbsensiController::class, 'update'])->name('absensi.update');
    Route::delete('absensi/{absensi}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');
    Route::get('absensi/jadwal/{pendaftar}', [AbsensiController::class, 'getJadwalByPendaftar']);
    // User
    Route::resource('users', UserController::class);
});

// Fallback Route for Admin
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});

// Home Route (Default Laravel Auth)
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/siswa/store', [SiswaController::class, 'store'])
    ->name('siswa.store')
    ->middleware(['auth', 'web']);






