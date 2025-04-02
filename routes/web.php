<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

    Route::prefix('admin')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
        Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
         // Users
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');

         
        

        
});



