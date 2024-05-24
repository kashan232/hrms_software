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
            $all_project = Project::all();
            $all_employee = Employee::all();
            $all_task = Task::all();
            $all_department = Department::all();
            $all_designation = Designation::all();
            return view('hr_panel.task.task', [
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
            // dd($request);
            $userId = Auth::id();
            $userType = Auth::user()->usertype;
            $emp_id = Auth::user()->emp_id;
            $emp_name = Auth::user()->name;

            // Fetch department and designation from the request
            $department = $request->department;
            $designation = $request->designation;

                $task = Task::create([
                    'admin_or_user_id'    => $userId,
                    'usertype' => $userType, // Adding usertype to the database
                    'user_name'          => $emp_name,
                    'emp_id'          => $emp_id,
                    'project_name'          => $request->project_name,
                    'task_category'          => $request->task_category,
                    'start_date'          => $request->start_date,
                    'end_date'          => $request->end_date,
                    'department'          => $department,
                    'designation'          => $designation,
                    'task_assign_person'          => $request->task_assign_person,
                    'task_priority'          => $request->task_priority,
                    'description'          => $request->description,
                    'created_at'        => now(),
                    'updated_at'        => now(),
                ]);

                $task->status = 'In Process';
                $task->save();

                return redirect()->back()->with('task-added', 'Task Added Successfully');
        } else {
            return redirect()->back();
        }
    }
}
