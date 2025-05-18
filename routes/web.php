<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\PenarikanController;
use App\Http\Controllers\BeritaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Admin Routes
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');

    // User management routes
    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('admin/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
});

// Ketua Routes
Route::middleware(['auth', RoleMiddleware::class . ':ketua'])->group(function () {
    Route::view('/ketua/dashboard', 'ketua.dashboard')->name('ketua.dashboard');
    Route::get('features/transaksi/ketua', [TransaksiController::class, 'indexPrint'])->name('transaksi.indexPrint');
    Route::get('features/saldo-terbaru/ketua', [SaldoController::class, 'indexNowPrint'])->name('saldo.indexNowPrint');
});

// Bendahara
Route::middleware(['auth', RoleMiddleware::class . ':bendahara'])->group(function () {
    Route::view('/bendahara/dashboard', 'bendahara.dashboard')->name('bendahara.dashboard');
});

// Petugas
Route::middleware(['auth', RoleMiddleware::class . ':petugas'])->group(function () {
    Route::view('/petugas/dashboard', 'petugas.dashboard')->name('petugas.dashboard');
});

// User
Route::middleware(['auth', RoleMiddleware::class . ':user'])->group(function () {
    Route::view('/user/dashboard', 'user.dashboard')->name('user.dashboard');
    Route::get('user/saldo/private', [SaldoController::class, 'indexPrivate'])->name('saldo.private')->middleware('auth');
    Route::get('user/riwayat-penarikan', [PenarikanController::class, 'indexPrivateUser'])->name('penarikan.indexPrivateUser');
});

// Profile (semua role)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});

Route::middleware(['auth', RoleMiddleware::class . ':admin,petugas'])->group(function () {
    Route::get('features/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('features/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('features/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('features/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('features/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('features/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
});

Route::middleware(['auth', RoleMiddleware::class . ':admin,ketua'])->group(function () {
    Route::resource('features/sampah', SampahController::class);
});

Route::middleware(['auth', RoleMiddleware::class . ':admin,ketua,bendahara'])->group(function () {
    Route::get('features/saldo/{userId}', [SaldoController::class, 'show'])->name('saldo.show');
});

Route::middleware(['auth', RoleMiddleware::class . ':admin,bendahara'])->group(function () {
    Route::get('features/saldo', [SaldoController::class, 'index'])->name('saldo.index');
    Route::get('features/saldo-terbaru', [SaldoController::class, 'indexNow'])->name('saldo.indexNow');

    Route::get('features/penarikan/user', [PenarikanController::class, 'showUsers'])->name('penarikan.showUsers');
    Route::get('features/penarikan/create', [PenarikanController::class, 'create'])->name('penarikan.create');
    Route::post('features/penarikan', [PenarikanController::class, 'store'])->name('penarikan.store');
    Route::get('features/penarikan', [PenarikanController::class, 'index'])->name('penarikan.index');
});

// Route::fallback(function () {
//     return response()->view('errors.404', [], 404);
// });

Route::get('/', [BeritaController::class, 'pageBerita']);
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/berita-all', [BeritaController::class, 'pageBeritaAll'])->name('berita.all');