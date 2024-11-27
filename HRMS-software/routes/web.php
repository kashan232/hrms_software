<?php

use App\Http\Controllers\AdminLeaveApproveController;
use App\Http\Controllers\CMRController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeAttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeLeaveRequestController;
use App\Http\Controllers\EmployeePerformanceController;
use App\Http\Controllers\EmployeePromotionController;
use App\Http\Controllers\EmployeeRemoteWorkController;
use App\Http\Controllers\EmployeeResignationController;
use App\Http\Controllers\EmployeeTaskUpdateController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HiringController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HrAndManagerAttendanceController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\HrEmployeeController;
use App\Http\Controllers\HRLeaveRequestController;
use App\Http\Controllers\HRLeavesController;
use App\Http\Controllers\HrManagerController;
use App\Http\Controllers\JobBoardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeavesRecordController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ManagerExpenseController;
use App\Http\Controllers\ManagerHiringController;
use App\Http\Controllers\ManagerLeaveRequestController;
use App\Http\Controllers\ManagerLeaveTypeController;
use App\Http\Controllers\ManagerPayrolController;
use App\Http\Controllers\ManagerProjectListingController;
use App\Http\Controllers\ManagerRevenueController;
use App\Http\Controllers\ManagerTaskController;
use App\Http\Controllers\MyTaskController;
use App\Http\Controllers\OfferLetterController;
use App\Http\Controllers\PayrolController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectListingController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportingController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TerminationOfEmployeeController;
use App\Models\EmployeePromotion;
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
// git connect on pc
// all code deploy 
// connected
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home'])->middleware(['auth'])->name('home');
Route::get('/admin-dashboard', [HomeController::class, 'adminpage'])->middleware(['auth','admin'])->name('admin-dashboard');

Route::post('/admin/mark-absent', [HomeController::class, 'markAbsent'])->name('admin.mark-absent');
// Mark Absent Manager
Route::post('/mark-absent-manager', [HomeController::class, 'markAbsentManager'])->name('admin.mark-absent-manager');

// Mark Absent Employee
Route::post('/mark-absent-employee', [HomeController::class, 'markAbsentEmployee'])->name('admin.mark-absent-employee');

// // make Admin
// Route::get('/add-admin', [HRController::class, 'add_admin'])->middleware(['auth','admin'])->name('add-admin');
// Route::post('/store-admin', [HRController::class, 'store_admin'])->name('store-admin');
// Route::get('/all-admin', [HRController::class, 'all_admin'])->middleware(['auth','admin'])->name('all-admin');
// Route::get('/edit-admin/{id}', [HRController::class, 'edit_admin'])->middleware(['auth','admin'])->name('edit-admin');
// Route::post('/update-admin/{id}', [HRController::class, 'update_admin'])->name('update-admin');

//Admin Panel
Route::get('/Admin-Change-Password', [HomeController::class, 'Admin_Change_Password'])->name('Admin-Change-Password');
Route::post('/updte-change-Password', [HomeController::class, 'updte_change_Password'])->name('updte-change-Password');

Route::get('/hr-Change-Password', [HRController::class, 'hr_Change_Password'])->name('hr-Change-Password');
Route::post('/hr-updte-change-Password', [HRController::class, 'hr_updte_change_Password'])->name('hr-updte-change-Password');

Route::get('/manager-Change-Password', [ManagerController::class, 'manager_Change_Password'])->name('manager-Change-Password');
Route::post('/manager-updte-change-Password', [ManagerController::class, 'manager_updte_change_Password'])->name('manager-updte-change-Password');

Route::get('/emp-Change-Password', [EmployeeController::class, 'emp_Change_Password'])->name('emp-Change-Password');
Route::post('/emp-updte-change-Password', [EmployeeController::class, 'emp_updte_change_Password'])->name('emp-updte-change-Password');


Route::get('/Quiz-creation', [QuizController::class, 'Quiz_creation'])->middleware(['auth','admin'])->name('Quiz-creation');
Route::get('/Quiz-store', [QuizController::class, 'Quiz_store'])->middleware(['auth','admin'])->name('Quiz-store');
Route::get('/all-quiz-creation', [QuizController::class, 'all_quiz_creation'])->middleware(['auth','admin'])->name('all-quiz-creation');
Route::get('/quiz/edit/{id}', [QuizController::class, 'editQuiz'])->name('quiz.edit');
Route::post('/quiz/update/{id}', [QuizController::class, 'updateQuiz'])->name('quiz.update');


//DEpartment
Route::get('/department', [DepartmentController::class, 'department'])->middleware(['auth','admin'])->name('department');
Route::post('/store-department', [DepartmentController::class, 'store_department'])->name('store-department');
Route::post('/update-department', [DepartmentController::class, 'update_department'])->name('update-department');
Route::delete('/delete-department/{id}', [DepartmentController::class, 'delete_department'])->middleware(['auth','admin'])->name('delete-department');


//designation
Route::get('/designation', [DesignationController::class, 'designation'])->middleware(['auth','admin'])->name('designation');
Route::post('/store-designation', [DesignationController::class, 'store_designation'])->name('store-designation');
Route::post('/update-designation', [DesignationController::class, 'update_designation'])->name('update-designation');
Route::delete('/delete-designation/{id}', [DesignationController::class, 'delete_designation'])->middleware(['auth','admin'])->name('delete-designation');

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
Route::get('/allhr-manager', [ManagerController::class, 'allhr_manager'])->middleware(['auth','admin'])->name('allhr-manager');
Route::get('/edit-manager/{id}', [ManagerController::class, 'edit_manager'])->middleware(['auth','admin'])->name('edit-manager');
Route::post('/update-manager/{id}', [ManagerController::class, 'update_manager'])->name('update-manager');

//Employees
Route::get('/all-employee', [EmployeeController::class, 'all_employee'])->middleware(['auth','admin'])->name('all-employee');
Route::get('/allhr-employee', [EmployeeController::class, 'allhr_employee'])->middleware(['auth','admin'])->name('allhr-employee');
Route::get('/add-employee', [EmployeeController::class, 'add_employee'])->middleware(['auth','admin'])->name('add-employee');
Route::post('/store-employee', [EmployeeController::class, 'store_employee'])->name('store-employee');
Route::delete('/delete-employee/{id}', [EmployeeController::class, 'delete_employee'])->middleware(['auth','admin'])->name('delete-employee');
Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit_employee'])->middleware(['auth','admin'])->name('edit-employee');
Route::post('/update-employee/{id}', [EmployeeController::class, 'update_employee'])->name('update-employee');
Route::get('/deleted-employee-screen', [EmployeeController::class, 'deleted_employee_screen'])->middleware(['auth','admin'])->name('deleted-employee-screen');
Route::get('/get-designations', [EmployeeController::class, 'getDesignations'])->name('get-designations');

// employee by hr 
//Employees
Route::get('/hr-all-employee', [HrEmployeeController::class, 'hr_all_employee'])->name('hr-all-employee');
Route::get('/hr-add-employee', [HrEmployeeController::class, 'hr_add_employee'])->name('hr-add-employee');
Route::post('/hr-store-employee', [HrEmployeeController::class, 'hr_store_employee'])->name('hr-store-employee');
Route::get('/hr-edit-employee/{id}', [HrEmployeeController::class, 'hr_edit_employee'])->name('hr-edit-employee');
Route::post('/hr-update-employee/{id}', [HrEmployeeController::class, 'hr_update_employee'])->name('hr-update-employee');

Route::get('/hr-add-manager', [HrManagerController::class, 'hr_add_manager'])->name('hr-add-manager');
Route::post('/hr-store-manager', [HrManagerController::class, 'hr_store_manager'])->name('hr-store-manager');
Route::get('/hr-all-manager', [HrManagerController::class, 'hr_all_manager'])->name('hr-all-manager');
Route::get('/hr-edit-manager/{id}', [HrManagerController::class, 'hr_edit_manager'])->name('hr-edit-manager');
Route::post('/hr-update-manager/{id}', [HrManagerController::class, 'hr_update_manager'])->name('hr-update-manager');

//Attendance
Route::get('/daily-attendance', [EmployeeAttendanceController::class, 'daily_attendance'])->middleware(['auth','admin'])->name('daily-attendance');
Route::get('/fetch-daily-employee-attendance-record', [EmployeeAttendanceController::class, 'fetch_daily_employee_attendance_record'])->name('fetch-daily-employee-attendance-record');


Route::get('/hr-offer-letter', [OfferLetterController::class, 'hr_offer_letter'])->name('hr-offer-letter');
Route::post('/store-hr-offer-letter', [OfferLetterController::class, 'store_hr_offer_letter'])->name('store-hr-offer-letter');
Route::get('/hr-all-offer-letter', [OfferLetterController::class, 'hr_all_offer_letter'])->name('hr-all-offer-letter');
Route::put('/offer-letters/update', [OfferLetterController::class, 'update'])->name('offer-letters.update');
Route::delete('/offer-letters/delete/{id}', [OfferLetterController::class, 'destroy'])->name('offer-letters.destroy');


Route::get('/hr-promotion', [EmployeePromotionController::class, 'hr_promotion'])->name('hr-promotion');
Route::post('/store-hr-promotion', [EmployeePromotionController::class, 'store_hr_promotion'])->name('store-hr-promotion');
Route::get('/hr-all-promotion', [EmployeePromotionController::class, 'hr_all_promotion'])->name('hr-all-promotion');
Route::put('/employee-promotions/{id}', [EmployeePromotionController::class, 'update'])->name('employee-promotions.update');
Route::delete('/employee-promotions/{id}', [EmployeePromotionController::class, 'destroy'])->name('employee-promotions.destroy');


Route::get('/hr-emp-termination', [TerminationOfEmployeeController::class, 'hr_emp_termination'])->name('hr-emp-termination');
Route::post('/store-hr-emp-termination', [TerminationOfEmployeeController::class, 'store_hr_emp_termination'])->name('store-hr-emp-termination');
Route::get('/hr-emp-all-termination', [TerminationOfEmployeeController::class, 'hr_emp_all_termination'])->name('hr-emp-all-termination');
Route::delete('/employee-terminations/{id}', [TerminationOfEmployeeController::class, 'destroy']);
Route::put('/employee-terminations/{id}', [TerminationOfEmployeeController::class, 'update']);


Route::get('/resignation-create', [EmployeeResignationController::class, 'resignation_create'])->name('resignation-create');
Route::post('/store-resignation-create', [EmployeeResignationController::class, 'store_resignation_create'])->name('store-resignation-create');
Route::get('/all-resignation', [EmployeeResignationController::class, 'all_resignation'])->name('all-resignation');


Route::get('/hr-all-resignation', [EmployeeResignationController::class, 'hr_all_resignation'])->name('hr-all-resignation');
Route::post('/update-resignation-status', [EmployeeResignationController::class, 'updateStatus']);


//Project
Route::get('/project', [ProjectController::class, 'project'])->middleware(['auth','admin'])->name('project');
Route::post('/store-project', [ProjectController::class, 'store_project'])->name('store-project');
Route::post('/update-project', [ProjectController::class, 'update'])->name('update-project');
Route::delete('/delete-project/{id}', [ProjectController::class, 'delete_project'])->name('delete-project');
Route::post('/update-project-status', [ProjectController::class, 'update_project_status'])->name('update-project-status');

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

//Revenue 
//Route::get('/revenue-listing', [LeavesRecordController::class, 'revenue_listing'])->name('revenue-listing');
Route::get('/all-revenue', [RevenueController::class, 'all_revenue'])->name('all-revenue');
Route::get('/add-revenue', [RevenueController::class, 'add_revenue'])->name('add-revenue');
Route::post('/store-revenue', [RevenueController::class, 'store_revenue'])->name('store-revenue');
Route::get('/edit-revenue/{id}', [RevenueController::class, 'edit_revenue'])->name('edit-revenue');
Route::post('/update-revenue/{id}', [RevenueController::class, 'update_revenue'])->name('update-revenue');
Route::delete('/delete-revenue/{id}', [RevenueController::class, 'delete_revenue'])->name('delete-revenue');


//Admin Approve Leaves
Route::get('/admin-all-leave', [AdminLeaveApproveController::class, 'admin_all_leave'])->name('admin-all-leave');
Route::get('/admin-pending-leave', [AdminLeaveApproveController::class, 'admin_pending_leave'])->name('admin-pending-leave');
Route::get('/admin-approve-leave', [AdminLeaveApproveController::class, 'admin_approve_leave'])->name('admin-approve-leave');
Route::get('/admin-reject-leave', [AdminLeaveApproveController::class, 'admin_reject_leave'])->name('admin-reject-leave');
Route::post('/admin-update-leave-approve', [AdminLeaveApproveController::class,'admin_updateLeaveApprove'])->name('admin-update-leave-approve');


// Employee Panel

// employee profile page
Route::get('/employee-profile-page', [ProfilePageController::class, 'employee_profile_page'])->name('employee-profile-page');
Route::get('/hr-profile-page', [ProfilePageController::class, 'hr_profile_page'])->name('hr-profile-page');
Route::get('/manager-profile-page', [ProfilePageController::class, 'manager_profile_page'])->name('manager-profile-page');
Route::post('/employee-profile-picture', [ProfilePageController::class,'employee_profile_picture'])->name('employee-profile-picture');

// Employee LeaveRequest
Route::get('/seprate-employee-cmr', [CMRController::class, 'seprate_employee_cmr'])->name('seprate-employee-cmr');
Route::get('/seprate-employee-cmr-add-suggestion', [CMRController::class, 'seprate_employee_cmr_add_suggestion'])->name('seprate-employee-cmr-add-suggestion');
Route::post('/seprate-store-employee-cmr-add-suggestion', [CMRController::class, 'seprate_store_employee_cmr_add_suggestion'])->name('seprate-store-employee-cmr-add-suggestion');

// Employee LeaveRequest
Route::get('/all-leaverequest', [LeaveRequestController::class, 'all_leaverequest'])->name('all-leaverequest');
Route::post('/store-leaverequest', [LeaveRequestController::class, 'store_leaverequest'])->name('store-leaverequest');
Route::post('/mark-leave-emp', [LeaveRequestController::class, 'mark_leave_emp'])->name('mark-leave-emp');

Route::get('/get-leave-balance', [LeaveRequestController::class, 'getLeaveBalance'])->name('get-leave-balance');
Route::get('/get-leave-balance-hr', [LeaveRequestController::class, 'get_leave_balance_hr'])->name('get-leave-balance-hr');
Route::get('/get-leave-balance-manager', [LeaveRequestController::class, 'get_leave_balance_manager'])->name('get-leave-balance-manager');


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

// Attendance routes
Route::get('/employee-attendance-create', [EmployeeAttendanceController::class, 'employee_attendance_create'])->name('employee-attendance-create');
Route::get('/employee-mark-attendance', [EmployeeAttendanceController::class, 'employee_mark_attendance'])->name('employee-mark-attendance');
Route::post('/employee-store-attendance', [EmployeeAttendanceController::class, 'employee_store_attendance'])->name('employee-store-attendance');
Route::get('/all-employee-attendance', [EmployeeAttendanceController::class, 'all_employee_attendance'])->name('all-employee-attendance');

Route::post('/employee/attendance/in', [EmployeeAttendanceController::class, 'markIn'])->name('employee-mark-attendance-in');
Route::post('/employee/attendance/out', [EmployeeAttendanceController::class, 'markOut'])->name('employee.attendance.out');


// Hr Attendance route
Route::get('/hr-attendance-create', [HrAndManagerAttendanceController::class, 'hr_attendance_create'])->name('hr-attendance-create');
Route::post('/hr/attendance/in', [HrAndManagerAttendanceController::class, 'markIn_hr'])->name('hr-attendance-in');
Route::post('/hr/attendance/out', [HrAndManagerAttendanceController::class, 'markOut_hr'])->name('hr.attendance.out');
Route::get('/hr-employee-attendance', [HrAndManagerAttendanceController::class, 'hr_employee_attendance'])->name('hr-employee-attendance');


// Manager Attendance route
Route::get('/Manager-attendance-create', [HrAndManagerAttendanceController::class, 'Manager_attendance_create'])->name('Manager-attendance-create');
Route::post('/Manager/attendance/in', [HrAndManagerAttendanceController::class, 'markIn_Manager'])->name('Manager-attendance-in-check');
Route::post('/Manager/attendance/out', [HrAndManagerAttendanceController::class, 'markOut_Manager'])->name('Manager.attendance.out');
Route::get('/Manager-employee-attendance', [HrAndManagerAttendanceController::class, 'Manager_employee_attendance'])->name('Manager-employee-attendance');


Route::get('/Manager-employee-record', [HrAndManagerAttendanceController::class, 'Manager_employee_record'])->name('Manager-employee-record');

//MyTask
Route::get('/mytask', [MyTaskController::class, 'mytask'])->name('mytask');
Route::post('/update-status', [MyTaskController::class, 'update_status'])->name('update-status');

//Remote work
Route::get('/add-employee-remote-work', [EmployeeRemoteWorkController::class, 'add_employee_remote_work'])->name('add-employee-remote-work');
Route::post('/store-remote-work', [EmployeeRemoteWorkController::class, 'store_remote_work'])->name('store-remote-work');
Route::get('/all-employee-remote-work', [EmployeeRemoteWorkController::class, 'all_employee_remote_work'])->name('all-employee-remote-work');

//Employee Performance 
Route::get('/employee-performance', [EmployeePerformanceController::class, 'employee_performance'])->name('employee-performance');

//HR panel

//HRLeaveType
Route::get('/all-leavetype', [LeaveTypeController::class, 'all_leavetype'])->name('all-leavetype');
Route::post('/store-leavetype', [LeaveTypeController::class, 'store_leavetype'])->name('store-leavetype');
Route::post('/update-leavetype', [LeaveTypeController::class, 'update_leavetype'])->name('update-leavetype');
Route::get('/delete-leavetype/{id}', [LeaveTypeController::class, 'delete_leavetype'])->name('delete-leavetype');

//HR Approve Leaves
Route::get('/all-leave', [HRLeavesController::class, 'all_leave'])->name('all-leave');
Route::get('/pending-leave', [HRLeavesController::class, 'pending_leave'])->name('pending-leave');
Route::get('/approve-leave', [HRLeavesController::class, 'approve_leave'])->name('approve-leave');
Route::get('/reject-leave', [HRLeavesController::class, 'reject_leave'])->name('reject-leave');
Route::post('/update-leave-approve', [HRLeavesController::class,'updateLeaveApprove'])->name('update-leave-approve');

// HR leave request
Route::get('/hr-all-leaverequest', [HRLeaveRequestController::class, 'hr_all_leaverequest'])->name('hr-all-leaverequest');
Route::post('/hr-store-leaverequest', [HRLeaveRequestController::class, 'hr_store_leaverequest'])->name('hr-store-leaverequest');
Route::post('/mark-leave', [HRLeaveRequestController::class, 'markLeave'])->name('leave.mark');

//HR Expense
Route::get('/all-expense', [ExpenseController::class, 'all_expense'])->name('all-expense');
Route::get('/add-expense', [ExpenseController::class, 'add_expense'])->name('add-expense');
Route::post('/store-expense', [ExpenseController::class, 'store_expense'])->name('store-expense');
Route::get('/edit-expense/{id}', [ExpenseController::class, 'edit_expense'])->name('edit-expense');
Route::post('/update-expense/{id}', [ExpenseController::class, 'update_expense'])->name('update-expense');
Route::get('/delete-expense/{id}', [ExpenseController::class, 'delete_expense'])->name('delete-expense');

//HR Hiring
Route::get('/all-hiring', [HiringController::class, 'all_hiring'])->name('all-hiring');
Route::get('/add-hiring', [HiringController::class, 'add_hiring'])->name('add-hiring');
Route::post('/store-hiring', [HiringController::class, 'store_hiring'])->name('store-hiring');
Route::put('/update-hiring', [HiringController::class, 'update_hiring'])->name('update-hiring');


//projects
Route::get('/project-listing-to-hr', [ProjectListingController::class, 'project_listing_to_hr'])->name('project-listing-to-hr');

//HR Task
Route::get('/task', [TaskController::class, 'task'])->name('task');
Route::post('/store-task', [TaskController::class, 'store_task'])->name('store-task');
//Route::get('/get-employees', [TaskController::class, 'getEmployees'])->name('get-employees');

//HR remote employee Listing
Route::get('/remote-employee-listing', [ProjectListingController::class, 'remote_employee_listing'])->name('remote-employee-listing');


//hr routes
// Salary
Route::get('/create-salary', [PayrolController::class, 'create_salary'])->name('create-salary');
Route::post('/post-create-salary', [PayrolController::class, 'post_create_salary'])->name('post-create-salary');
Route::get('/generate-salary', [PayrolController::class, 'generate_salary'])->name('generate-salary');
Route::get('/salary-print/{id}', [PayrolController::class, 'printSalary'])->name('salary-print');

// Manager panel

//Manager LeaveType
Route::get('/manager-all-leavetype', [ManagerLeaveTypeController::class, 'manager_all_leavetype'])->name('manager-all-leavetype');
Route::post('/manager-store-leavetype', [ManagerLeaveTypeController::class, 'manager_store_leavetype'])->name('manager-store-leavetype');
Route::post('/manager-update-leavetype', [ManagerLeaveTypeController::class, 'manager_update_leavetype'])->name('manager-update-leavetype');

// Employee LeaveRequest
Route::get('/manager-all-leaverequest', [ManagerLeaveRequestController::class, 'manager_all_leaverequest'])->name('manager-all-leaverequest');
Route::post('/manager-store-leaverequest', [ManagerLeaveRequestController::class, 'manager_store_leaverequest'])->name('manager-store-leaverequest');
Route::post('/mark-leave-mngr', [ManagerLeaveRequestController::class, 'mark_leave_mngr'])->name('mark-leave-mngr');

//Manager Expense
Route::get('/manager-all-expense', [ManagerExpenseController::class, 'manager_all_expense'])->name('manager-all-expense');
Route::get('/manager-add-expense', [ManagerExpenseController::class, 'manager_add_expense'])->name('manager-add-expense');
Route::post('/manager-store-expense', [ManagerExpenseController::class, 'manager_store_expense'])->name('manager-store-expense');
Route::put('/manager-update-expense/{id}', [ManagerExpenseController::class, 'updateExpense'])->name('manager-update-expense');
Route::delete('/manager-delete-expense/{id}', [ManagerExpenseController::class, 'deleteExpense'])->name('manager-delete-expense');

//HR Hiring
Route::get('/manager-all-hiring', [ManagerHiringController::class, 'manager_all_hiring'])->name('manager-all-hiring');
Route::get('/manager-add-hiring', [ManagerHiringController::class, 'manager_add_hiring'])->name('manager-add-hiring');
Route::post('/manager-store-hiring', [ManagerHiringController::class, 'manager_store_hiring'])->name('manager-store-hiring');


//Manager projects LIsting
Route::get('/project-listing-to-manager', [ManagerProjectListingController::class, 'project_listing_to_manager'])->name('project-listing-to-manager');

//Manager Task
Route::get('/manager-task', [ManagerTaskController::class, 'manager_task'])->name('manager-task');
Route::get('/manager-add-task', [ManagerTaskController::class, 'manager_add_task'])->name('manager-add-task');

Route::post('/manager-store-task', [ManagerTaskController::class, 'manager_store_task'])->name('manager-store-task');
Route::post('/manager-update-task', [ManagerTaskController::class, 'manager_update_task'])->name('manager-update-task');
Route::delete('/delete-manager-task/{id}', [ManagerTaskController::class, 'delete_manager_task'])->name('delete-manager-task');

//Manager Revenue
Route::get('/manager-all-revenue', [ManagerRevenueController::class, 'manager_all_revenue'])->name('manager-all-revenue');
Route::get('/manager-add-revenue', [ManagerRevenueController::class, 'manager_add_revenue'])->name('manager-add-revenue');
Route::post('/manager-store-revenue', [ManagerRevenueController::class, 'manager_store_revenue'])->name('manager-store-revenue'); 

// Admin Reporting Routes
Route::get('/report-employee-attendance', [ReportController::class, 'report_employee_attendance'])->name('report-employee-attendance');
Route::get('/report-employee-monthly-attendance-record', [ReportController::class, 'report_employee_monthly_attendance_record'])->name('report-employee-monthly-attendance-record');
Route::get('/individual-employee-attendance/{id}/{dep}/{at_date}/{total_month_days}', [ReportController::class, 'individual_employee_attendance'])->name('individual-employee-attendance');

//Manager remote employee Listing
Route::get('/manager-remote-employee-listing', [ProjectListingController::class, 'manager_remote_employee_listing'])->name('manager-remote-employee-listing');

// Salary
Route::get('/manager-create-salary', [ManagerPayrolController::class, 'manager_create_salary'])->name('manager-create-salary');
Route::post('/manager-post-create-salary', [ManagerPayrolController::class, 'manager_post_create_salary'])->name('manager-post-create-salary');
Route::get('/manager-generate-salary', [ManagerPayrolController::class, 'manager_generate_salary'])->name('manager-generate-salary');
Route::get('/manager-salary-print/{id}', [ManagerPayrolController::class, 'manager_printSalary'])->name('manager-salary-print');


Route::get('/report-employee-performance', [ReportingController::class, 'report_employee_performance'])->name('report-employee-performance');
Route::get('/get-employees', [ReportingController::class, 'get_employees'])->name('get-employees');
Route::get('/get-report-employee-performance', [ReportingController::class, 'get_report_employee_performance'])->name('get-report-employee-performance');
Route::get('/report-expense', [ReportingController::class, 'report_expense'])->name('report-expense');
Route::get('/get-expense-report', [ReportingController::class, 'get_expense_report'])->name('get-expense-report');
Route::get('/report-revenue', [ReportingController::class, 'report_revenue'])->name('report-revenue');
Route::get('/get-revenue-report', [ReportingController::class, 'get_revenue_report'])->name('get-revenue-report');
Route::get('/report-leave', [ReportingController::class, 'report_leave'])->name('report-leave');
Route::get('/get-leave-report', [ReportingController::class, 'get_leave_report'])->name('get-leave-report');
Route::get('/hr-report-leave', [ReportingController::class, 'hr_report_leave'])->name('hr-report-leave');
Route::get('/get-hr-leave-report', [ReportingController::class, 'get_hr_leave_report'])->name('get-hr-leave-report');
Route::get('/manager-report-leave', [ReportingController::class, 'manager_report_leave'])->name('manager-report-leave');
Route::get('/get-manager-leave-report', [ReportingController::class, 'get_manager_leave_report'])->name('get-manager-leave-report');
Route::get('/report-expense-hr', [ReportingController::class, 'report_expense_hr'])->name('report-expense-hr');
Route::get('/get-expense-report-hr', [ReportingController::class, 'get_expense_report_hr'])->name('get-expense-report-hr');
Route::get('/report-employee-cmr-hr', [ReportingController::class, 'report_employee_cmr_hr'])->name('report-employee-cmr-hr');
Route::get('/get-report-employee-cmr-hr', [ReportingController::class, 'get_report_employee_cmr_hr'])->name('get-report-employee-cmr-hr');
Route::get('/report-all-jobs-hr', [ReportingController::class, 'report_all_jobs_hr'])->name('report-all-jobs-hr');
Route::get('/get-jobs-report', [ReportingController::class, 'get_jobs_report'])->name('get-jobs-report');
Route::get('/report-expense-manager', [ReportingController::class, 'report_expense_manager'])->name('report-expense-manager');
Route::get('/get-expense-report-manager', [ReportingController::class, 'get_expense_report_manager'])->name('get-expense-report-manager');
Route::get('/report-all-jobs-manager', [ReportingController::class, 'report_all_jobs_manager'])->name('report-all-jobs-manager');
Route::get('/get-jobs-report-manager', [ReportingController::class, 'get_jobs_report_manager'])->name('get-jobs-report-manager');

Route::get('/report-all-task-manager', [ReportingController::class, 'report_all_task_manager'])->name('report-all-task-manager');
Route::get('/get-task-report-manager', [ReportingController::class, 'get_task_report_manager'])->name('get-task-report-manager');

    
Route::get('/job-page', [JobController::class, 'job_page'])->name('job-page');
Route::get('/job-listing/{id}', [JobController::class, 'job_listing'])->name('job-listing');
Route::get('/job-details/{id}', [JobController::class, 'job_details'])->name('job-details');


Route::get('/apply-job/{id}', [JobController::class, 'apply_job'])->name('apply-job');
Route::post('/submit-job-application', [JobController::class, 'submit'])->name('job_application.submit');



Route::get('/job-applications', [JobBoardController::class, 'job_applications'])->name('job-applications');
Route::get('/approved-applications', [JobBoardController::class, 'approved_applications'])->name('approved-applications');
Route::get('/rejected-applications', [JobBoardController::class, 'rejected_applications'])->name('rejected-applications');
Route::get('/Intervied-applications', [JobBoardController::class, 'Intervied_applications'])->name('Intervied-applications');
Route::get('/hired-applications', [JobBoardController::class, 'hired_applications'])->name('hired-applications');
Route::post('/store-job-applications', [JobBoardController::class, 'store_job_applications'])->name('store-job-applications');
Route::get('/view-applications/{id}', [JobBoardController::class, 'view_applications'])->name('view-applications');
Route::get('/get-quizzes', [JobBoardController::class, 'getQuizzes'])->name('get-quizzes');
Route::post('/assign-quiz', [JobBoardController::class, 'assignQuiz'])->name('assign-quiz');

Route::get('/quiz-results/{applicationId}', [JobBoardController::class, 'getQuizResults']);
Route::post('/hire-candidate/{id}', [JobBoardController::class, 'hireCandidate']);
Route::post('/update-interview-status/{id}', [JobBoardController::class, 'updateInterviewStatus']);


Route::get('/quizze-atempt-login', [JobBoardController::class, 'quizze_atempt_login'])->name('quizze-atempt-login');
Route::post('/candidate-login', [JobBoardController::class, 'candidate_login'])->name('candidate-login');
Route::get('/quizze-atempt', [JobBoardController::class, 'quizze_atempt'])->name('quizze-atempt')->middleware('auth.candidate');
Route::post('/submit-quiz', [JobBoardController::class, 'submitQuiz'])->name('submit-quiz');
Route::post('/candidate-logout', [JobBoardController::class, 'candidate_logout'])->name('candidate-logout');


Route::get('/add-job-board', [JobBoardController::class, 'add_job_board'])->name('add-job-board');
Route::post('/store-job-board', [JobBoardController::class, 'store_job_board'])->name('store-job-board');
Route::get('/all-job-board', [JobBoardController::class, 'all_job_board'])->name('all-job-board');


Route::get('/add-job-page/{id}', [JobBoardController::class, 'add_job_page'])->name('add-job-page');
Route::post('/store-job-page', [JobBoardController::class, 'store_job_page'])->name('store-job-page');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
