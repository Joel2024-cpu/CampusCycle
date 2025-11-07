<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// Halaman utama
Route::get('/', function () {
    return view('home');
})->name('home');

// 🔐 AUTH ROUTES
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 👥 USER ROUTES - TANPA MIDDLEWARE
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

// 🧑‍💼 ADMIN ROUTES - TANPA MIDDLEWARE
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Tambahkan ini saja di web.php
// routes/web.php
Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Tambahkan manual check di setiap method controller
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/bicycles', [AdminController::class, 'bicycles'])->name('admin.bicycles');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/payments', [AdminController::class, 'payments'])->name('admin.payments');
    Route::get('/transactions', [AdminController::class, 'transactions'])->name('admin.transactions');
    Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports');
});
