<?php

namespace App\Http\Controllers;

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
            return view('admin_panel.task.task', [
                'all_project' => $all_project,
                'all_employee' => $all_employee,
                'all_task' => $all_task,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function store_project(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Project::create([
                'admin_or_user_id'    => $userId,
                'project_name'          => $request->project_name,
                'project_category'          => $request->project_category,
                'project_start_date'          => $request->project_start_date,
                'project_end_date'          => $request->project_end_date,
                'budget'          => $request->budget,
                'priority'          => $request->priority,
                'description'          => $request->description,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('project-added', 'Projects Added Successfully');
        } else {
            return redirect()->back();
        }
    }
}
