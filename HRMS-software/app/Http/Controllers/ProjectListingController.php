<?php

namespace App\Http\Controllers;

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
}
