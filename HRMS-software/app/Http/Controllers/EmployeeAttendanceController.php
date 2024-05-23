<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeAttendanceController extends Controller
{
   
   

    public function daily_attendance(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $Departments = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.attendance.daily_attendance', [
                'Departments' => $Departments
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function fetch_daily_employee_attendance_record(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $dept_name = $request->input('department');
            $designation = $request->input('designation');
            $attendance_date = $request->input('employee_attendance_date');
            // dd($dept_name,$designation,$attendance_date);

            $attendance_records = EmployeeAttendance::where('department', $dept_name)
                ->where('job_designation', $designation)
                ->where('employee_attendance_date', $attendance_date)
                ->get();

            // dd($attendance_records);
            return view('admin_panel.attendance.fetch_daily_attendance', [
                'attendance_records' => $attendance_records
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function employee_attendance_create()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $Employee = Employee::where('email', '=', $useremail)->first();
            return view('employee_panel.attendance.create_attendance', [
                'Employee' => $Employee,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function employee_mark_attendance(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $dept_name = $request->input('department');
            $designation = $request->input('designation');
            $start_time = $request->input('start_time');
            $end_time = $request->input('end_time');
            
            $employee_attendance_date = $request->input('employee_attendance_date');
            $all_employess = Employee::where('email', $useremail)->where('department', $dept_name)->where('designation', $designation)->get();
            $employees_attendance_data = DB::table('employee_attendances')
                ->where('admin_or_user_id', $userId)
                ->where('department', $dept_name)
                ->where('employee_attendance_date', $employee_attendance_date)
                ->pluck('employee_attendance', 'emp_id')
                ->toArray();

            // $Departments = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('employee_panel.attendance.employee_mark_attendance', [
                'dept_name' => $dept_name,
                'employee_attendance_date' => $employee_attendance_date,
                'designation' => $designation,
                'all_employess' => $all_employess,
                'employees_attendance_data' => $employees_attendance_data,
                'start_time' => $start_time,
                'end_time' => $end_time,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function employee_store_attendance(Request $request)
    {

        if (Auth::id()) {
            $userId = Auth::id();
            // dd($request);
            $empIds = $request->input('emp_id');
            $employee_attendance_date = $request->input('employee_attendance_date');
            $empNames = $request->input('emp_name');
            $employees_attendance_data = $request->input('attendance');
            $department = $request->input('department');
            $job_designation = $request->input('job_designation');
            $start_time = $request->input('start_time');
            $end_time = $request->input('end_time');

            foreach ($empIds as $index => $empId) {
                $attendance = $employees_attendance_data[$empId];

                $recordExists = EmployeeAttendance::where('emp_id', $empId)
                    ->where('employee_attendance_date', $employee_attendance_date)
                    ->exists();

                if ($recordExists) {
                    EmployeeAttendance::where('emp_id', $empId)
                        ->where('employee_attendance_date', $employee_attendance_date)
                        ->update([
                            'employee_attendance' => $attendance,
                        ]);
                } else {
                    EmployeeAttendance::create([
                        'admin_or_user_id' => $userId,
                        'emp_id' => $empId,
                        'department' => $department,
                        'job_designation' => $job_designation,
                        'start_time' => $start_time,
                        'end_time' => $end_time,
                        'emp_name' => $empNames[$index],
                        'employee_attendance_date' => $employee_attendance_date,
                        'employee_attendance' => $attendance,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }

            return Redirect()->back()->with('attendance_save', 'Attendance create successfully!');
        } else {
            return redirect()->back();
        }
    }

    public function all_employee_attendance(Request $request)
    {
        if (Auth::id()) {
           
            // dd($dept_name,$designation,$attendance_date);
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            
            $attendance_records = EmployeeAttendance::where('admin_or_user_id', $userId)->get();

            // dd($attendance_records);

            // dd($attendance_records);
            return view('employee_panel.attendance.employee_fetch_daily_attendance', [
                'attendance_records' => $attendance_records
            ]);
        } else {
            return redirect()->back();
        }
    }
}
