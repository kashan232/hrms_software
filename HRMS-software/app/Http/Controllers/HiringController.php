<?php

namespace App\Http\Controllers;

use App\Models\Hiring;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HiringController extends Controller
{
    public function all_hiring()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_hiring = Hiring::all();
            return view('hr_panel.hiring.all_hiring', [
                'all_hiring' => $all_hiring,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function add_hiring()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('hr_panel.hiring.add_hiring', []);
        } else {
            return redirect()->back();
        }
    }
    public function store_hiring(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $userType = Auth::user()->usertype;
            // Create the employee record
            // dd($request);
            $hiring = Hiring::create([
                'admin_or_user_id' => $userId,
                'usertype' => $userType, // Adding usertype to the database
                'date' => $request->date,
                'designation' => $request->designation,
                'job_description' => $request->job_description,
                'education' => $request->education,
                'skills' => $request->skills,
                'experience' => $request->experience,
                'status' => $request->status,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('hiring-added', 'hiring Created Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function update_hiring(Request $request)
    {
        $hiring = Hiring::find($request->job_id);

        if ($hiring) {
            $hiring->date = $request->date;
            $hiring->designation = $request->designation;
            $hiring->job_description = $request->job_description;
            $hiring->education = $request->education;
            $hiring->skills = $request->skills;
            $hiring->experience = $request->experience;
            $hiring->status = $request->status;
            $hiring->updated_at = Carbon::now();

            $hiring->save();

            return redirect()->back()->with('hiring-updated', 'Hiring updated successfully.');
        }

        return redirect()->back()->with('error', 'Hiring not found.');
    }
}
