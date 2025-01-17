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
use App\Http\Controllers\KelulusanController;
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
    // Route untuk menyimpan data siswa
    Route::post('/daftar-kursus/siswa', [SiswaController::class, 'store'])
        ->name('siswa.store');
    
    // Route untuk menyimpan pendaftaran kursus
    Route::post('/daftar-kursus/pendaftaran', [PendaftaranController::class, 'store'])
        ->name('daftar.kursus.store');
        
    // Route untuk menampilkan form pendaftaran
    Route::get('/daftar-kursus', [PendaftaranController::class, 'create'])
        ->name('daftar.kursus');
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
});

// Fallback Route for Admin
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});

// Home Route (Default Laravel Auth)
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Pendaftaran Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('pendaftaran.')->group(function () {
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('index');
    Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('store');
    Route::get('/pendaftaran/{pendaftaran}', [PendaftaranController::class, 'show'])->name('show');
    Route::put('/pendaftaran/{pendaftaran}', [PendaftaranController::class, 'update'])->name('update');
    Route::delete('/pendaftaran/{pendaftaran}', [PendaftaranController::class, 'destroy'])->name('destroy');
    Route::delete('/admin/pendaftaran/{id}', [PendaftaranController::class, 'destroy'])
    ->name('pendaftaran.destroy');
});

// Paket Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('paket.')->group(function () {
    Route::get('/paket', [PaketController::class, 'index'])->name('index');
    Route::post('/paket', [PaketController::class, 'store'])->name('store');
    Route::get('/paket/{paket}', [PaketController::class, 'show'])->name('show');
    Route::put('/paket/{paket}', [PaketController::class, 'update'])->name('update');
    Route::delete('/paket/{paket}', [PaketController::class, 'destroy'])->name('destroy');
});

// Jadwal Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('jadwal.')->group(function () {
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('index');
    Route::get('/jadwal/detail/{pendaftar}', [JadwalController::class, 'getJadwalByPendaftar'])->name('detail');
    Route::post('/jadwal/create-empty/{pendaftarId}', [JadwalController::class, 'createEmptyJadwal'])->name('create-empty');
    Route::put('/jadwal/bulk-update/{pendaftar}', [JadwalController::class, 'bulkUpdate'])->name('bulk-update');
    Route::resource('jadwal', JadwalController::class);
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('absensi.')->group(function () {
    // Rute individu untuk absensi
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('index');
    Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('create');
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('store');
    Route::get('/absensi/{absensi}', [AbsensiController::class, 'show'])->name('show');
    Route::get('/absensi/{absensi}/edit', [AbsensiController::class, 'edit'])->name('edit');
    Route::put('/absensi/{absensi}', [AbsensiController::class, 'update'])->name('update');
    Route::delete('/absensi/{absensi}', [AbsensiController::class, 'destroy'])->name('destroy');
    Route::get('absensi/jadwal/{pendaftar}', [AbsensiController::class, 'getJadwalByPendaftar'])->name('jadwal');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('users.')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('index');
    Route::get('/users/create', [UserController::class, 'create'])->name('create');
    Route::post('/users', [UserController::class, 'store'])->name('store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('show');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('destroy');
});
