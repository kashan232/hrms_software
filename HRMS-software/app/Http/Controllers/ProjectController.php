<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Manager;
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
            $departments = Department::where('admin_or_user_id', '=', $userId)->get();

            $all_project = Project::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.project.project', [
                'all_project' => $all_project,
                'departments' => $departments,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function get_managers(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $usertype = Auth()->user()->usertype;
            $useremail = Auth()->user()->email;
            $designation = $request->designation;
            $department = $request->department;

            $Managers = Manager::where('department', $department)
                ->where('designation', $designation)
                ->get(['id', 'first_name', 'last_name'])
                ->mapWithKeys(function ($Managers) {
                    return [$Managers->id => $Managers->first_name . ' ' . $Managers->last_name];
                });

            return response()->json($Managers);
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
                'project_deadline'        => $request->project_deadline,
                'project_category'    => $request->project_category,
                'project_start_date'  => $request->project_start_date,
                'project_end_date'    => $request->project_end_date,
                'budget'              => $request->budget,
                'priority'            => $request->priority,
                'department'            => $request->department,
                'designation'            => $request->designation,
                'asign_managers'            => $request->asign_managers,
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

    public function update(Request $request)
    {
        $project = Project::find($request->project_id);
        $project->project_name = $request->project_name;
        $project->project_deadline = $request->project_deadline;
        $project->project_category = $request->project_category;
        $project->project_start_date = $request->project_start_date;
        $project->project_end_date = $request->project_end_date;
        $project->budget = $request->budget;
        $project->priority = $request->priority;
        $project->department = $request->department;
        $project->designation = $request->designation;
        $project->asign_managers = $request->asign_managers;
        $project->description = $request->description;
        $project->save();

        return redirect()->back()->with('success', 'Project updated successfully');
    }

    public function delete_project(Request $request, $id)
    {
        $delete = Project::find($id)->delete();
        return redirect()->back()->with('success', 'Project Has Been Deleted Successsfully');
    }

    public function update_project_status(Request $request)
    {
        $project = Project::find($request->project_id);
        if ($project) {
            $project->is_completed = $request->is_completed;
            $project->status = $request->is_completed ? 'Completed' : 'Pending';
            $project->save();
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Project not found']);
        }
    }
}
