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
            $all_department = Department::all();
            $Employees = Employee::all();
            return view('employee_panel.resignatoin.add_resignatoin', [
                'all_department' => $all_department,
                'Employees' => $Employees,
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
            $OfferLetters = EmployeeResignation::create([
                'admin_or_user_id'    => $userId,
                'employee_name'          => $request->employee_name,
                'curent_position'          => $request->curent_position,
                'new_position'          => $request->new_position,
                'department'          => $request->department,
                'designation'          => $request->designation,
                'new_salary'          => $request->new_salary,
                'date'          => $request->date,
                'jobDescription'          => $request->jobDescription,
                'additionalNotes'          => $request->additionalNotes,
                'created_by'          => $usertype,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('promotion-added', 'Employee Promotion Created Successfully');
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
            $EmployeePromotions = EmployeeResignation::where('admin_or_user_id', '=', $userId)->where('created_by', '=', $usertype)->get();
            return view('employee_panel.resignatoin.all_resignatoin', [
                'EmployeePromotions' => $EmployeePromotions,
            ]);
        } else {
            return redirect()->back();
        }
    }

}
