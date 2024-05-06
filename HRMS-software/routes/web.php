<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ProfileController;
use App\Models\LeaveRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// git connect

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home'])->middleware(['auth'])->name('home');
Route::get('/admin-dashboard', [HomeController::class, 'adminpage'])->middleware(['auth','admin'])->name('admin-dashboard');

//DEpartment
Route::get('/department', [DepartmentController::class, 'department'])->middleware(['auth','admin'])->name('department');
Route::post('/store-department', [DepartmentController::class, 'store_department'])->name('store-department');
Route::post('/update-department', [DepartmentController::class, 'update_department'])->name('update-department');


//designation
Route::get('/designation', [DesignationController::class, 'designation'])->middleware(['auth','admin'])->name('designation');
Route::post('/store-designation', [DesignationController::class, 'store_designation'])->name('store-designation');
Route::post('/update-designation', [DesignationController::class, 'update_designation'])->name('update-designation');

//Employees
Route::get('/all-employee', [EmployeeController::class, 'all_employee'])->middleware(['auth','admin'])->name('all-employee');
Route::get('/add-employee', [EmployeeController::class, 'add_employee'])->middleware(['auth','admin'])->name('add-employee');
Route::post('/store-employee', [EmployeeController::class, 'store_employee'])->name('store-employee');
Route::get('/delete-employee/{id}', [EmployeeController::class, 'delete_employee'])->middleware(['auth','admin'])->name('delete-employee');
Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit_employee'])->middleware(['auth','admin'])->name('edit-employee');
Route::post('/update-employee/{id}', [EmployeeController::class, 'update_employee'])->name('update-employee');
Route::get('/deleted-employee-screen', [EmployeeController::class, 'deleted_employee_screen'])->middleware(['auth','admin'])->name('deleted-employee-screen');
Route::get('/get-designations', [EmployeeController::class, 'getDesignations'])->name('get-designations');



//LeaveType
Route::get('/all-leavetype', [LeaveTypeController::class, 'all_leavetype'])->middleware(['auth','admin'])->name('all-leavetype');
Route::post('/store-leavetype', [LeaveTypeController::class, 'store_leavetype'])->name('store-leavetype');
Route::post('/update-leavetype', [LeaveTypeController::class, 'update_leavetype'])->name('update-leavetype');

// LeaveRequest
Route::get('/all-leaverequest', [LeaveRequestController::class, 'all_leaverequest'])->middleware(['auth','admin'])->name('all-leaverequest');
Route::post('/store-leaverequest', [LeaveRequestController::class, 'store_leaverequest'])->name('store-leaverequest');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
