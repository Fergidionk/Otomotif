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
Route::get('/daftar-kursus', [App\Http\Controllers\PendaftaranController::class, 'create'])->name('daftar.kursus');

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
Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');  
    // Siswa
    Route::resource('admin/siswa', SiswaController::class);
    // Pendaftaran
    Route::resource('admin/pendaftaran', PendaftaranController::class);
    // Paket
    Route::resource('admin/paket', PaketController::class);
    // Jadwal
    Route::get('admin/jadwal/detail/{pendaftar}', [JadwalController::class, 'getJadwalByPendaftar']);
    Route::post('/admin/jadwal/create-empty/{pendaftarId}', [JadwalController::class, 'createEmptyJadwal'])->name('jadwal.create-empty');
    Route::put('admin/jadwal/bulk-update/{pendaftar}', [JadwalController::class, 'bulkUpdate']);
    Route::resource('admin/jadwal', JadwalController::class);
    // Absensi
    Route::get('admin/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::get('admin/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
    Route::post('admin/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
    Route::get('admin/absensi/{absensi}', [AbsensiController::class, 'show'])->name('absensi.show');
    Route::get('admin/absensi/{absensi}/edit', [AbsensiController::class, 'edit'])->name('absensi.edit');
    Route::put('admin/absensi/{absensi}', [AbsensiController::class, 'update'])->name('absensi.update');
    Route::delete('admin/absensi/{absensi}', [AbsensiController::class, 'destroy'])->name('absensi.destroy');
    Route::get('admin/absensi/jadwal/{pendaftar}', [AbsensiController::class, 'getJadwalByPendaftar']);
    // User
    Route::resource('admin/users', UserController::class);
});



// Fallback Route for Admin
Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});

// Home Route (Default Laravel Auth)
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





