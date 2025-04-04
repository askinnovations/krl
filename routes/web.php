<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;


Route::get('/', function () {
    return view('welcome');
});

    Route::prefix('admin')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
        Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
         

        // User Management Routes
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/view/{id}', [UserController::class, 'show'])->name('admin.users.view');  // 🔥 Fixed
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('admin.users.update'); // 🔥 Fixed
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');
    });

    Route::prefix('vehicles')->group(function () {
        Route::get('/', [VehicleController::class, 'index'])->name('admin.vehicles.index'); // 🚘 List Vehicles
        Route::get('/create', [VehicleController::class, 'create'])->name('admin.vehicles.create'); // 🆕 Add New Vehicle
        Route::post('/store', [VehicleController::class, 'store'])->name('admin.vehicles.store'); // 💾 Store Vehicle Data
        Route::get('/view/{id}', [VehicleController::class, 'show'])->name('admin.vehicles.view'); // 👀 View Vehicle Details
        Route::get('/edit/{id}', [VehicleController::class, 'edit'])->name('admin.vehicles.edit'); // ✏ Edit Vehicle
        Route::POST('/update/{id}', [VehicleController::class, 'update'])->name('admin.vehicles.update'); // 🔄 Update Vehicle
        Route::delete('/delete/{id}', [VehicleController::class, 'destroy'])->name('admin.vehicles.delete'); // ❌ Delete Vehicle
    });
    
});



