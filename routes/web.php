<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// --- Route User / Public ---
Route::get('/', function () {
    return view('user.home');
})->name('home');

// --- Route Khusus ADMIN (Diproteksi Middleware) ---
// Kita buat "Group" agar tidak perlu nulis middleware berulang-ulang
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    
    // 1. Dashboard Admin
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // 2. Manajemen Produk (CRUD)
    // Masukkan di sini agar aman, hanya admin yang bisa akses
    Route::resource('/products', ProductController::class); 
});

// --- Route Profile (Bawaan Breeze) ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';