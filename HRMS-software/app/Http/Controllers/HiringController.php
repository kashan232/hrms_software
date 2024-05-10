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
            $all_hiring = Hiring::where('admin_or_user_id', '=', $userId)->get();
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
            return view('hr_panel.hiring.add_hiring', [
            ]);
        } else {
            return redirect()->back();
        }

        return view('');
    }
    public function store_hiring(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // Create the employee record
            dd($request);
            $hiring = Hiring::create([
                'admin_or_user_id' => $userId,
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
}
