<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function task()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_project = Project::where('admin_or_user_id', '=', $userId)->get();
            $all_employee = Employee::where('admin_or_user_id', '=', $userId)->get();
            $all_task = Task::where('admin_or_user_id', '=', $userId)->get();
            $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            $all_designation = Designation::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.task.task', [
                'all_project' => $all_project,
                'all_employee' => $all_employee,
                'all_task' => $all_task,
                'all_department' => $all_department,
                'all_designation' => $all_designation,
            ]);
        } else {
            return redirect()->back();
        }
    }
    
    public function store_task(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Task::create([
                'admin_or_user_id'    => $userId,
                'project_name'          => $request->project_name,
                'task_category'          => $request->task_category,
                'start_date'          => $request->start_date,
                'end_date'          => $request->end_date,
                'department'          => $request->department,
                'designation'          => $request->designation,
                'task_assign_person'          => $request->task_assign_person,
                'task_priority'          => $request->task_priority,
                'description'          => $request->description,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('task added', 'task Added Successfully');
        } else {
            return redirect()->back();
        }
    }
}
