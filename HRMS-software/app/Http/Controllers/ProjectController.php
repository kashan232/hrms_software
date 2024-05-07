<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function project()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_project = Project::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.project.project', [
                'all_project' => $all_project,
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
