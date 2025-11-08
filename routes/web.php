<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// 🔹 Landing Page
Route::get('/', function () {
    return view('home');
})->name('home');

// 🔐 Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'App\Http\Middleware\UserMiddleware'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});



// 🧑‍💼 Admin Area (Middleware)
Route::middleware(['auth', 'App\Http\Middleware\AdminMiddleware'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/bicycles', [AdminController::class, 'bicycles'])->name('admin.bicycles');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/payments', [AdminController::class, 'payments'])->name('admin.payments');
    Route::get('/transactions', [AdminController::class, 'transactions'])->name('admin.transactions');
    Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports');
});

Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::get('/user/bicycles', [UserController::class, 'bicycles'])->name('user.bicycles');
Route::post('/user/rent/{bicycleId}', [UserController::class, 'rentBicycle'])->name('user.rent');
Route::get('/user/history', [UserController::class, 'history'])->name('user.history');
