<?php

namespace App\Http\Controllers;

use App\Models\EmployeeRemoteWork;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectListingController extends Controller
{
    public function project_listing_to_hr()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_project = Project::all();
            return view('hr_panel.project.project_listing_to_hr', [
                'all_project' => $all_project,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function remote_employee_listing()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_remote = EmployeeRemoteWork::all();
            return view('hr_panel.remote_employee.remote_employee_listing', [
                'all_remote' => $all_remote,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function manager_remote_employee_listing()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_remote = EmployeeRemoteWork::all();
            return view('manager_panel.remote_employee.manager_remote_employee_listing', [
                'all_remote' => $all_remote,
            ]);
        } else {
            return redirect()->back();
        }
    }
    
}
