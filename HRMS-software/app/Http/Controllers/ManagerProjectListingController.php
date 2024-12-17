<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerProjectListingController extends Controller
{
    public function project_listing_to_manager()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $emp_id = auth()->user()->emp_id;
            $all_project = Project::where('asign_managers', '=', $emp_id)->get();
            return view('manager_panel.project.project_listing_to_manager', [
                'all_project' => $all_project,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
