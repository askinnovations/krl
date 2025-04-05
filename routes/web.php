<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    EmployeeController, PayrollController, Auth\LoginController, AdminDashboardController,
    UserController, TyreController, WarehouseController, OrderController,
    ConsignmentNoteController, FreightBillController, StockTransferController, DriverController,
    AttendanceController, MaintenanceController, VehicleController
};

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::prefix('admin')->group(function () {

    // Login & Logout Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    // Dashboard Route
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // User Management
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/store', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/view/{id}', [UserController::class, 'show'])->name('admin.users.view');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');
    });

    // Vehicles Management
    Route::prefix('vehicles')->group(function () {
        Route::get('/', [VehicleController::class, 'index'])->name('admin.vehicles.index');
        Route::get('/create', [VehicleController::class, 'create'])->name('admin.vehicles.create');
        Route::post('/store', [VehicleController::class, 'store'])->name('admin.vehicles.store');
        Route::get('/view/{id}', [VehicleController::class, 'show'])->name('admin.vehicles.view');
        Route::get('/edit/{id}', [VehicleController::class, 'edit'])->name('admin.vehicles.edit');
        Route::post('/update/{id}', [VehicleController::class, 'update'])->name('admin.vehicles.update');
        Route::delete('/delete/{id}', [VehicleController::class, 'destroy'])->name('admin.vehicles.delete');
    });

    // Orders Management
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::get('/create', [OrderController::class, 'create'])->name('admin.orders.create');
        Route::post('/store', [OrderController::class, 'store'])->name('admin.orders.store');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('admin.orders.edit');
        Route::get('/view/{id}', [OrderController::class, 'show'])->name('admin.orders.view');
        Route::post('/update/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
        Route::delete('/delete/{id}', [OrderController::class, 'destroy'])->name('admin.orders.delete');
    });
    
    
    // Consignment Management
    Route::prefix('consignments')->group(function () {
        Route::get('/', [ConsignmentNoteController::class, 'index'])->name('admin.consignments.index');
        Route::get('/create', [ConsignmentNoteController::class, 'create'])->name('admin.consignments.create');
        Route::post('/store', [ConsignmentNoteController::class, 'store'])->name('admin.consignments.store');
        Route::get('/edit/{id}', [ConsignmentNoteController::class, 'edit'])->name('admin.consignments.edit');
        Route::get('/view/{id}', [ConsignmentNoteController::class, 'show'])->name('admin.consignments.view');
        Route::post('/update/{id}', [ConsignmentNoteController::class, 'update'])->name('admin.consignments.update');
        Route::delete('/delete/{id}', [ConsignmentNoteController::class, 'destroy'])->name('admin.consignments.delete');
    });

    // Freight Bill Management
    Route::prefix('freight-bill')->group(function () {
        Route::get('/', [FreightBillController::class, 'index'])->name('admin.freight-bill.index');
        Route::get('/create', [FreightBillController::class, 'create'])->name('admin.freight-bill.create');
        Route::post('/store', [FreightBillController::class, 'store'])->name('admin.freight-bill.store');
        Route::get('/view/{id}', [FreightBillController::class, 'show'])->name('admin.freight-bill.view');
        Route::get('/edit/{id}', [FreightBillController::class, 'edit'])->name('admin.freight-bill.edit');
        Route::post('/update/{id}', [FreightBillController::class, 'update'])->name('admin.freight-bill.update');
        Route::delete('/delete/{id}', [FreightBillController::class, 'destroy'])->name('admin.freight-bill.delete');
    });

    // Tyre Management
    Route::prefix('tyres')->group(function () {
        Route::get('/', [TyreController::class, 'index'])->name('admin.tyres.index');
        Route::post('/store', [TyreController::class, 'store'])->name('admin.tyres.store');
        Route::put('/update/{id}', [TyreController::class, 'update'])->name('admin.tyres.update');
        Route::delete('/delete/{id}', [TyreController::class, 'destroy'])->name('admin.tyres.delete');
    });

    // Warehouse Management
    Route::prefix('warehouse')->group(function () {
        Route::get('/', [WarehouseController::class, 'index'])->name('admin.warehouse.index');
        Route::post('/store', [WarehouseController::class, 'store'])->name('admin.warehouse.store');
        Route::put('/update/{id}', [WarehouseController::class, 'update'])->name('admin.warehouse.update');
        Route::delete('/delete/{id}', [WarehouseController::class, 'destroy'])->name('admin.warehouse.delete');
    });

    // Other Modules
    Route::get('/stock-transfer/index', [StockTransferController::class, 'index'])->name('admin.stock.index');
    Route::get('/employees/index', [EmployeeController::class, 'index'])->name('admin.employees.index');
    Route::get('/drivers/index', [DriverController::class, 'index'])->name('admin.drivers.index');
    Route::get('/attendance/index', [AttendanceController::class, 'index'])->name('admin.attendance.index');
    Route::get('/payroll/index', [PayrollController::class, 'index'])->name('admin.payroll.index');
    // Route::get('/maintenance/index', [MaintenanceController::class, 'index'])->name('admin.maintenance.index');
});
