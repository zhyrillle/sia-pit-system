<?php

use App\Http\Controllers\LibrarianController;

Route::get('/librarian/login', [LibrarianController::class, 'showLoginForm'])->name('librarian.login.form');
Route::post('/librarian/login', [LibrarianController::class, 'login'])->name('librarian.login');

use App\Http\Controllers\DashboardController;

Route::get('/librarian/dashboard', [DashboardController::class, 'showdashboard'])->name('librarian.dashboard.form');
Route::post('/librarian/dashboard', [DashboardController::class, 'dashboard'])->name('librarian.dashboard');

use App\Http\Controllers\RequestController;

Route::get('/librarian/request', [RequestController::class, 'showrequest'])->name('librarian.request.form');
Route::post('/librarian/request', [RequestController::class, 'request'])->name('librarian.request');

use App\Http\Controllers\HomeController;

Route::get('/librarian/home', [HomeController::class, 'showhome'])->name('librarian.home.form');
Route::post('/librarian/home', [HomeController::class, 'home'])->name('librarian.home');
    
    
    

