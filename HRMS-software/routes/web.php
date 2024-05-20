<?php

use App\Http\Controllers\CMRController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeAttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeLeaveRequestController;
use App\Http\Controllers\EmployeeRemoteWorkController;
use App\Http\Controllers\EmployeeTaskUpdateController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HiringController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\HRLeavesController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeavesRecordController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ManagerLeaveTypeController;
use App\Http\Controllers\MyTaskController;
use App\Http\Controllers\PayrolController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectListingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\TaskController;
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
// aiman pagal hai
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home'])->middleware(['auth'])->name('home');
Route::get('/admin-dashboard', [HomeController::class, 'adminpage'])->middleware(['auth','admin'])->name('admin-dashboard');

//Admin Panel

//DEpartment
Route::get('/department', [DepartmentController::class, 'department'])->middleware(['auth','admin'])->name('department');
Route::post('/store-department', [DepartmentController::class, 'store_department'])->name('store-department');
Route::post('/update-department', [DepartmentController::class, 'update_department'])->name('update-department');


//designation
Route::get('/designation', [DesignationController::class, 'designation'])->middleware(['auth','admin'])->name('designation');
Route::post('/store-designation', [DesignationController::class, 'store_designation'])->name('store-designation');
Route::post('/update-designation', [DesignationController::class, 'update_designation'])->name('update-designation');

//HR
Route::get('/add-hr', [HRController::class, 'add_hr'])->middleware(['auth','admin'])->name('add-hr');
Route::post('/store-hr', [HRController::class, 'store_hr'])->name('store-hr');
Route::get('/all-hr', [HRController::class, 'all_hr'])->middleware(['auth','admin'])->name('all-hr');
Route::get('/edit-hr/{id}', [HRController::class, 'edit_hr'])->middleware(['auth','admin'])->name('edit-hr');
Route::post('/update-hr/{id}', [HRController::class, 'update_hr'])->name('update-hr');

//Manager
Route::get('/add-manager', [ManagerController::class, 'add_manager'])->middleware(['auth','admin'])->name('add-manager');
Route::post('/store-manager', [ManagerController::class, 'store_manager'])->name('store-manager');
Route::get('/all-manager', [ManagerController::class, 'all_manager'])->middleware(['auth','admin'])->name('all-manager');
Route::get('/edit-manager/{id}', [ManagerController::class, 'edit_manager'])->middleware(['auth','admin'])->name('edit-manager');
Route::post('/update-manager/{id}', [ManagerController::class, 'update_manager'])->name('update-manager');

//Employees
Route::get('/all-employee', [EmployeeController::class, 'all_employee'])->middleware(['auth','admin'])->name('all-employee');
Route::get('/add-employee', [EmployeeController::class, 'add_employee'])->middleware(['auth','admin'])->name('add-employee');
Route::post('/store-employee', [EmployeeController::class, 'store_employee'])->name('store-employee');
Route::get('/delete-employee/{id}', [EmployeeController::class, 'delete_employee'])->middleware(['auth','admin'])->name('delete-employee');
Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit_employee'])->middleware(['auth','admin'])->name('edit-employee');
Route::post('/update-employee/{id}', [EmployeeController::class, 'update_employee'])->name('update-employee');
Route::get('/deleted-employee-screen', [EmployeeController::class, 'deleted_employee_screen'])->middleware(['auth','admin'])->name('deleted-employee-screen');
Route::get('/get-designations', [EmployeeController::class, 'getDesignations'])->name('get-designations');


//Attendance
Route::get('/daily-attendance', [EmployeeAttendanceController::class, 'daily_attendance'])->middleware(['auth','admin'])->name('daily-attendance');
Route::get('/fetch-daily-employee-attendance-record', [EmployeeAttendanceController::class, 'fetch_daily_employee_attendance_record'])->name('fetch-daily-employee-attendance-record');


//Project
Route::get('/project', [ProjectController::class, 'project'])->middleware(['auth','admin'])->name('project');
Route::post('/store-project', [ProjectController::class, 'store_project'])->name('store-project');

//done task list
Route::get('/employee-task-update', [EmployeeTaskUpdateController::class, 'employee_task_update'])->middleware(['auth','admin'])->name('employee-task-update');

//leaves record
Route::get('/leaves', [LeavesRecordController::class, 'leaves'])->name('leaves');

//remote employee Listing for admin
Route::get('/remote-emp-list', [LeavesRecordController::class, 'remote_emp_list'])->name('remote-emp-list');

//Hiring Listing for admin
Route::get('/hiring-listing', [LeavesRecordController::class, 'hiring_listing'])->name('hiring-listing');

//Expense Listing for admin
Route::get('/expense-listing', [LeavesRecordController::class, 'expense_listing'])->name('expense-listing');

//Revenue Listing for admin
Route::get('/revenue-listing', [LeavesRecordController::class, 'revenue_listing'])->name('revenue-listing');
// Employee Panel

// LeaveRequest
Route::get('/all-leaverequest', [LeaveRequestController::class, 'all_leaverequest'])->name('all-leaverequest');
Route::post('/store-leaverequest', [LeaveRequestController::class, 'store_leaverequest'])->name('store-leaverequest');

Route::get('/employee-cmr', [CMRController::class, 'employee_cmr'])->name('employee-cmr');
Route::get('/employee-cmr-add-skills', [CMRController::class, 'employee_cmr_add_skills'])->name('employee-cmr-add-skills');
Route::post('/store-employee-cmr-add-skills', [CMRController::class, 'store_employee_cmr_add_skills'])->name('store-employee-cmr-add-skills');
Route::get('/employee-cmr-add-insurance', [CMRController::class, 'employee_cmr_add_insurance'])->name('employee-cmr-add-insurance');
Route::post('/store-employee-cmr-add-insurance', [CMRController::class, 'store_employee_cmr_add_insurance'])->name('store-employee-cmr-add-insurance');
Route::get('/employee-cmr-add-training', [CMRController::class, 'employee_cmr_add_training'])->name('employee-cmr-add-training');
Route::post('/store-employee-cmr-add-training', [CMRController::class, 'store_employee_cmr_add_training'])->name('store-employee-cmr-add-training');
Route::get('/employee-cmr-add-experience', [CMRController::class, 'employee_cmr_add_experience'])->name('employee-cmr-add-experience');
Route::post('/store-employee-cmr-add-experience', [CMRController::class, 'store_employee_cmr_add_experience'])->name('store-employee-cmr-add-experience');
Route::get('/employee-cmr-add-salaires', [CMRController::class, 'employee_cmr_add_salaires'])->name('employee-cmr-add-salaires');
Route::post('/store-employee-cmr-add-salaires', [CMRController::class, 'store_employee_cmr_add_salaires'])->name('store-employee-cmr-add-salaires');
Route::get('/employee-cmr-add-suggestion', [CMRController::class, 'employee_cmr_add_suggestion'])->name('employee-cmr-add-suggestion');
Route::post('/store-employee-cmr-add-suggestion', [CMRController::class, 'store_employee_cmr_add_suggestion'])->name('store-employee-cmr-add-suggestion');

Route::get('/employee-attendance-create', [EmployeeAttendanceController::class, 'employee_attendance_create'])->name('employee-attendance-create');
Route::get('/employee-mark-attendance', [EmployeeAttendanceController::class, 'employee_mark_attendance'])->name('employee-mark-attendance');
Route::post('/employee-store-attendance', [EmployeeAttendanceController::class, 'employee_store_attendance'])->name('employee-store-attendance');
Route::get('/all-employee-attendance', [EmployeeAttendanceController::class, 'all_employee_attendance'])->name('all-employee-attendance');

//MyTask
Route::get('/mytask', [MyTaskController::class, 'mytask'])->name('mytask');
Route::post('/update-status', [MyTaskController::class, 'update_status'])->name('update-status');

//Remote work
Route::get('/add-employee-remote-work', [EmployeeRemoteWorkController::class, 'add_employee_remote_work'])->name('add-employee-remote-work');
Route::post('/store-remote-work', [EmployeeRemoteWorkController::class, 'store_remote_work'])->name('store-remote-work');
Route::get('/all-employee-remote-work', [EmployeeRemoteWorkController::class, 'all_employee_remote_work'])->name('all-employee-remote-work');

//HR panel

//HRLeaveType
Route::get('/all-leavetype', [LeaveTypeController::class, 'all_leavetype'])->name('all-leavetype');
Route::post('/store-leavetype', [LeaveTypeController::class, 'store_leavetype'])->name('store-leavetype');
Route::post('/update-leavetype', [LeaveTypeController::class, 'update_leavetype'])->name('update-leavetype');

//Approve Leaves
Route::get('/all-leave', [HRLeavesController::class, 'all_leave'])->name('all-leave');
Route::get('/pending-leave', [HRLeavesController::class, 'pending_leave'])->name('pending-leave');
Route::get('/approve-leave', [HRLeavesController::class, 'approve_leave'])->name('approve-leave');
Route::get('/reject-leave', [HRLeavesController::class, 'reject_leave'])->name('reject-leave');
Route::post('/update-leave-approve', [HRLeavesController::class,'updateLeaveApprove'])->name('update-leave-approve');

//Expense
Route::get('/all-expense', [ExpenseController::class, 'all_expense'])->name('all-expense');
Route::get('/add-expense', [ExpenseController::class, 'add_expense'])->name('add-expense');
Route::post('/store-expense', [ExpenseController::class, 'store_expense'])->name('store-expense');

//Hiring
Route::get('/all-hiring', [HiringController::class, 'all_hiring'])->name('all-hiring');
Route::get('/add-hiring', [HiringController::class, 'add_hiring'])->name('add-hiring');
Route::post('/store-hiring', [HiringController::class, 'store_hiring'])->name('store-hiring');

//Revenue
Route::get('/all-revenue', [RevenueController::class, 'all_revenue'])->name('all-revenue');
Route::get('/add-revenue', [RevenueController::class, 'add_revenue'])->name('add-revenue');
Route::post('/store-revenue', [RevenueController::class, 'store_revenue'])->name('store-revenue');

//projects
Route::get('/project-listing-to-hr', [ProjectListingController::class, 'project_listing_to_hr'])->name('project-listing-to-hr');

//Task
Route::get('/task', [TaskController::class, 'task'])->name('task');
Route::post('/store-task', [TaskController::class, 'store_task'])->name('store-task');
//Route::get('/get-employees', [TaskController::class, 'getEmployees'])->name('get-employees');

//remote employee
Route::get('/remote-employee-listing', [ProjectListingController::class, 'remote_employee_listing'])->name('remote-employee-listing');


//hr routes
Route::get('/create-salary', [PayrolController::class, 'create_salary'])->name('create-salary');
Route::post('/post-create-salary', [PayrolController::class, 'post_create_salary'])->name('post-create-salary');
Route::get('/generate-salary', [PayrolController::class, 'generate_salary'])->name('generate-salary');
Route::get('/salary-print/{id}', [PayrolController::class, 'printSalary'])->name('salary-print');

// Manager panel
//Manager LeaveType
Route::get('/manager-all-leavetype', [ManagerLeaveTypeController::class, 'manager_all_leavetype'])->name('manager-all-leavetype');
Route::post('/manager-store-leavetype', [ManagerLeaveTypeController::class, 'manager_store_leavetype'])->name('manager-store-leavetype');
Route::post('/manager-update-leavetype', [ManagerLeaveTypeController::class, 'manager_update_leavetype'])->name('manager-update-leavetype');

// Admin Reporting Routes
Route::get('/report-employee-attendance', [ReportController::class, 'report_employee_attendance'])->name('report-employee-attendance');
Route::get('/report-employee-monthly-attendance-record', [ReportController::class, 'report_employee_monthly_attendance_record'])->name('report-employee-monthly-attendance-record');
Route::get('/individual-employee-attendance/{id}/{dep}/{at_date}/{total_month_days}', [ReportController::class, 'individual_employee_attendance'])->name('individual-employee-attendance');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
