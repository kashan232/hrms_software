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
            // dd($userId);
            $all_project = Project::all();
            return view('manager_panel.project.project_listing_to_manager', [
                'all_project' => $all_project,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
