<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function department()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.department.department', [
                'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function store_department(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Department::create([
                'admin_or_user_id'    => $userId,
                'department'          => $request->department,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('department-added', 'Department Added Successfully');
        } else {
            return redirect()->back();
        }
    }
    public function update_department(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            // dd($request);
            $update_id = $request->input('department_id');
            $department = $request->input('department_name');

            Department::where('id', $update_id)->update([
                'department'   => $department,
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('department-update', 'Department Updated Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function delete_department(Request $request, $id)
    {
        $Department = Department::find($id)->delete();
        return redirect()->back()->with('delete-message', 'Department Has Been Deleted Successsfully');
    }

}