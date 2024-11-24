<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Hr;
use App\Models\HrMnagerAttendance;
use App\Models\Manager;
use App\Models\MnagerAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HrAndManagerAttendanceController extends Controller
{

    public function hr_attendance_create()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;

            // dd($userId,$usertype,$useremail);
            $hr = Hr::where('email', '=', $useremail)->first();
            // dd($hr);

            $employeeName = auth()->user()->name;
            $emp_id = Auth()->user()->emp_id;

            // dd($employeeName,$emp_id);
            $attendance_details = HrMnagerAttendance::where('emp_id', '=', $emp_id)->where('emp_name', '=', $employeeName)->first();
            // dd($attendance_details);
            return view('hr_panel.attendance.create_attendance', [
                'hr' => $hr,
                'attendance_details' => $attendance_details,
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function markIn_hr(Request $request)
    {
        $emp_id = Auth()->user()->emp_id;
        $currentDate = $request->employee_attendance_date;
        $currentTime = $request->start_time;
        $designation = $request->designation;

        // Check if attendance record already exists for today
        $attendance = HrMnagerAttendance::where('emp_id', $emp_id)
            ->whereDate('employee_attendance_date', $currentDate)
            ->first();

        if (!$attendance) {
            // Create attendance record and mark start time
            HrMnagerAttendance::create([
                'usertype' => 'HR',
                'emp_id' => $emp_id,
                'emp_name' => Auth()->user()->name,
                'employee_attendance_date' => $currentDate,
                'start_time' => $currentTime,
                'employee_attendance' => 'Present',
                'job_designation' => $designation
            ]);

            return response()->json(['success' => 'Attendance marked successfully']);
        }

        return response()->json(['error' => 'Attendance already marked for today'], 400);
    }


    public function markOut_hr(Request $request)
    {
        $emp_id = Auth()->user()->emp_id;
        $currentDate = $request->employee_attendance_date;

        $endtime = $request->end_time;

        // Update attendance record with end time
        $attendance = HrMnagerAttendance::where('emp_id', $emp_id)
            ->whereDate('employee_attendance_date', $currentDate)
            ->first();
        if ($attendance) {
            $attendance->update([
                'end_time' => $endtime
            ]);
        }
        return response()->json(['success' => 'Attendance marked out successfully']);
    }

    public function hr_employee_attendance(Request $request)
    {
        if (Auth::id()) {

            // dd($dept_name,$designation,$attendance_date);
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;

            $employeeName = auth()->user()->name;
            $emp_id = Auth()->user()->emp_id;

            $attendance_records = HrMnagerAttendance::where('emp_id', $emp_id)->where('emp_name', $employeeName)->get();

            return view('hr_panel.attendance.employee_fetch_daily_attendance', [
                'attendance_records' => $attendance_records
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function Manager_attendance_create()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;

            // dd($userId,$usertype,$useremail);
            $Manager = Manager::where('email', '=', $useremail)->first();
            // dd($Manager);

            $employeeName = auth()->user()->name;
            $emp_id = Auth()->user()->emp_id;

            // dd($employeeName,$emp_id);
            $attendance_details = MnagerAttendance::where('emp_id', '=', $emp_id)->where('emp_name', '=', $employeeName)->first();
            // dd($attendance_details);
            return view('manager_panel.attendance.create_attendance', [
                'Manager' => $Manager,
                'attendance_details' => $attendance_details,
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function markIn_Manager(Request $request)
    {
        $emp_id = Auth()->user()->emp_id; // Get the logged-in employee ID
        $emp_name = Auth()->user()->name; // Get the logged-in employee name
        $currentDate = $request->employee_attendance_date; // Get the attendance date from request
        $currentTime = $request->start_time; // Get the start time from request
        // dd($emp_id);
        $designation = $request->designation;
        // Check if attendance record already exists for the specific emp_id, emp_name, usertype, and date
        $attendance = MnagerAttendance::where('emp_id', $emp_id)
            ->where('emp_name', $emp_name)
            ->where('usertype', 'Manager') // Ensure it's specifically for the Manager
            ->whereDate('employee_attendance_date', $currentDate) // Check the date
            ->exists(); // Use `exists()` to check if any record exists

        if (!$attendance) {
            // Create a new attendance record for the Manager
            MnagerAttendance::create([
                'usertype' => 'Manager',
                'emp_id' => $emp_id,
                'emp_name' => $emp_name,
                'employee_attendance_date' => $currentDate,
                'start_time' => $currentTime,
                'employee_attendance' => 'Present',
                'job_designation' => $designation
            ]);

            return response()->json(['success' => 'Attendance marked successfully']);
        }

        // If attendance already exists for the specific emp_id, emp_name, usertype, and date, return an error
        return response()->json(['error' => 'Attendance already marked for today'], 400);
    }





    public function markOut_Manager(Request $request)
    {
        $emp_id = Auth()->user()->emp_id;
        $currentDate = $request->employee_attendance_date;
        $endtime = $request->end_time;

        // Check if attendance record exists for the employee on the given date
        $attendance = MnagerAttendance::where('emp_id', $emp_id)
            ->whereDate('employee_attendance_date', $currentDate)
            ->first();

        // If attendance doesn't exist, return error message
        if (!$attendance) {
            return response()->json(['error' => 'No attendance marked today. Kindly check-in first.'], 400);
        }

        // Update attendance record with the end time
        $attendance->update([
            'end_time' => $endtime
        ]);

        return response()->json(['success' => 'Attendance marked out successfully']);
    }

    public function Manager_employee_attendance(Request $request)
    {
        if (Auth::id()) {

            // dd($dept_name,$designation,$attendance_date);
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;

            $employeeName = auth()->user()->name;
            $emp_id = Auth()->user()->emp_id;

            $attendance_records = MnagerAttendance::where('emp_id', $emp_id)->where('emp_name', $employeeName)->get();

            return view('manager_panel.attendance.employee_fetch_daily_attendance', [
                'attendance_records' => $attendance_records
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function Manager_employee_record()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;

            $emp_id = auth()->user()->emp_id;

            $all_employee = Employee::where('reporting_manager', $emp_id)->get();
            // dd($all_employee);
            return view('manager_panel.remote_employee.all_employee', [
                'all_employee' => $all_employee,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
