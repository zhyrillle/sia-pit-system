<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BorrowedBookController;
use Illuminate\Support\Facades\Route;

// Default route
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes (already included by default via Breeze)
require __DIR__.'/auth.php';

// Routes requiring authentication
Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Added routes
    Route::resource('users', UserController::class);
    Route::resource('staff', StaffController::class);

    // Borrowed Books routes
    Route::get('/borrowed-books', [BorrowedBookController::class, 'index'])->name('borrowed-books.index');
    Route::post('/borrowed-books', [BorrowedBookController::class, 'store'])->name('borrowed-books.store');
    Route::post('/borrowed-books/{id}/return', [BorrowedBookController::class, 'returnBook'])->name('borrowed-books.return');
});


