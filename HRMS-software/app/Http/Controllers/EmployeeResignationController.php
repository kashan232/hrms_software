<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeResignation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeResignationController extends Controller
{

    public function resignation_create()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $emp_id = Auth()->user()->emp_id;
            // dd($userId);
            $all_department = Department::all();
            $Employee = Employee::where('id', '=', $emp_id)->first();
            // dd($Employee);
            return view('employee_panel.resignatoin.add_resignatoin', [
                'all_department' => $all_department,
                'Employee' => $Employee,
            ]);
        } else {
            return redirect()->back();
        }

        return view('');
    }
    public function store_resignation_create(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            $emp_id = Auth()->user()->emp_id;

            $EmployeeResignation = EmployeeResignation::create([
                'admin_or_user_id'    => $userId,
                'emp_id'    => $emp_id,
                'employeeName'          => $request->employeeName,
                'department'          => $request->department,
                'designation'          => $request->designation,
                'resignationDate'          => $request->resignationDate,
                'lastWorkingDay'          => $request->lastWorkingDay,
                'resignationReason'          => $request->resignationReason,
                'status'          => 'Pending',
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('resignation-added', 'Your Resignation Is Created Successfully');
        } else {
            return redirect()->back();
        }
    }
    public function all_resignation()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $usertype = Auth()->user()->usertype;
            $emp_id = Auth()->user()->emp_id;

            $EmployeeResignations = EmployeeResignation::where('emp_id', '=', $emp_id)->get();
            return view('employee_panel.resignatoin.all_resignatoin', [
                'EmployeeResignations' => $EmployeeResignations,
            ]);
        } else {
            return redirect()->back();
        }
    }



    public function hr_all_resignation()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $usertype = Auth()->user()->usertype;
            $EmployeeResignations = EmployeeResignation::all();
            return view('hr_panel.resignatoin.all_resignatoin', [
                'EmployeeResignations' => $EmployeeResignations,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updateStatus(Request $request)
    {
        $resignation = EmployeeResignation::find($request->id);
        if ($resignation) {
            $resignation->status = $request->status;
            $resignation->save();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
