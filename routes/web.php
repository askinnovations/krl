<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    EmployeeController, PayrollController, Auth\LoginController, AdminDashboardController,
    UserController, TyreController, WarehouseController, DashboardController, OrderController,
    ConsignmentNoteController, FreightBillController, StockTransferController, DriverController,
    AttendanceController, MaintenanceController, VehicleController
};

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    // Authentication Routes
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
        Route::put('/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
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

    // Tyres Management
    Route::prefix('tyres')->group(function () {
        Route::get('/', [TyreController::class, 'index'])->name('admin.tyres.index');
        Route::post('/store', [TyreController::class, 'store'])->name('admin.tyres.store');
        Route::put('/{id}', [TyreController::class, 'update'])->name('admin.tyres.update');
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
    Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::get('/order/index', [OrderController::class, 'index'])->name('admin.order.index');
    Route::get('/consignment-note/index', [ConsignmentNoteController::class, 'index'])->name('admin.consignment.index');
    Route::get('/freight-bill/index', [FreightBillController::class, 'index'])->name('admin.freight.index');
    Route::get('/stock-transfer/index', [StockTransferController::class, 'index'])->name('admin.stock.index');
    Route::get('/employees/index', [EmployeeController::class, 'index'])->name('admin.employees.index');
    Route::get('/drivers/index', [DriverController::class, 'index'])->name('admin.drivers.index');
    Route::get('/attendance/index', [AttendanceController::class, 'index'])->name('admin.attendance.index');
    Route::get('/payroll/index', [PayrollController::class, 'index'])->name('admin.payroll.index');
    Route::get('/maintenance/index', [MaintenanceController::class, 'index'])->name('admin.maintenance.index');
});
