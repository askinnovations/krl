<?php
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TyreController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ConsignmentNoteController;
use App\Http\Controllers\FreightBillController;
use App\Http\Controllers\StockTransferController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\MaintenanceController;




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
        Route::prefix('admin')->group(function(){
        Route::get('/tyres/index',[TyreController::class,'index'])->name('admin.tyres.index');
        Route::post('/tyres/store', [TyreController::class, 'store'])->name('admin.tyres.store');
        Route::put('/tyres/{id}', [TyreController::class, 'update'])->name('admin.tyres.update');
        Route::get('/tyres/delete/{id}', [TyreController::class, 'destroy'])->name('admin.tyres.delete');
     });
        Route::prefix('admin')->group(function(){
        Route::get('/warehouse/index',[WarehouseController::class,'index'])->name('admin.warehouse.index');
        Route::post('/warehouse/store', [WarehouseController::class, 'store'])->name('admin.warehouse.store');
        Route::put('/warehouse/update/{id}', [WarehouseController::class, 'update'])->name('admin.warehouse.update');
        Route::get('/warehouse/delete/{id}', [WarehouseController::class, 'destroy'])->name('admin.warehouse.delete');

    });

//dashborad route
    Route::get('/admin/dashboard/index',[DashboardController::class,'index'])->name('admin.dashboard.index'); 

//order-
    Route::get('/admin/order/index',[OrderController::class,'index'])->name('admin.order-booking.index'); 

    //Consignment Note
    Route::get('/admin/consignment-note/index',[ConsignmentNoteController::class,'index'])->name('admin.consignment_note.index'); 

    //freight bill
    Route::get('/admin/freight-bill/index',[FreightBillController::class,'index'])->name('admin.freight_bill.index');
    
    
    //stock-transfer
    Route::get('/admin/stock-transfer/index',[StockTransferController::class,'index'])->name('admin.stock_transfer.index');
    

    //employees
    Route::get('/admin/employees/index',[EmployeeController::class,'index'])->name('admin.employess.index'); 
    
    
    //Drivers
    Route::get('/admin/drivers/index',[DriverController::class,'index'])->name('admin.drivers.index'); 

    //Attendance
    Route::get('/admin/Attendance/index',[AttendanceController::class,'index'])->name('admin.attendance.index'); 

    //payroll
    Route::get('/admin/payroll/index',[PayrollController::class,'index'])->name('admin.payroll.index');

    //vehicles
    Route::get('/admin/vehicles/index',[VehicleController::class,'index'])->name('admin.vehicles.index');

    //Maintenance
    Route::get('/admin/maintenance/index',[MaintenanceController::class,'index'])->name('admin.maintenance.index');

    



