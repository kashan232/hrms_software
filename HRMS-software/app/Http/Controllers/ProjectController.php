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
    public function store_project(Request $request)
    {
        if (Auth::id()) {
            $user = Auth::user(); // Get the authenticated user
            $userId = $user->id;
            $usertype = $user->usertype;
            $userName = $user->name;
            Project::create([
                'admin_or_user_id'    => $userId,
                'usertype'            => $usertype, // Store usertype
                'user_name'           => $userName, // Store user_name
                'project_name'        => $request->project_name,
                'project_category'    => $request->project_category,
                'project_start_date'  => $request->project_start_date,
                'project_end_date'    => $request->project_end_date,
                'budget'              => $request->budget,
                'priority'            => $request->priority,
                'description'         => $request->description,
                'status'              => 'Pending', // Set status as Pending by default
                'created_at'          => now(),
                'updated_at'          => now(),
            ]);
            return redirect()->back()->with('project-added', 'Project Added Successfully');
        } else {
            return redirect()->back();
        }
    }
}
