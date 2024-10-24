<?php

namespace App\Http\Controllers;

use App\Models\Hr;
use App\Models\HrMnagerAttendance;
use App\Models\Manager;
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
            $attendance_details = HrMnagerAttendance::where('emp_id', '=', $emp_id)->where('emp_name', '=', $employeeName)->first();
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
                'usertype' => 'Manager',
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


    public function markOut_Manager(Request $request)
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

    public function Manager_employee_attendance(Request $request)
    {
        if (Auth::id()) {

            // dd($dept_name,$designation,$attendance_date);
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;

            $employeeName = auth()->user()->name;
            $emp_id = Auth()->user()->emp_id;

            $attendance_records = HrMnagerAttendance::where('emp_id', $emp_id)->where('emp_name', $employeeName)->get();

            return view('manager_panel.attendance.employee_fetch_daily_attendance', [
                'attendance_records' => $attendance_records
            ]);
        } else {
            return redirect()->back();
        }
    }



}
