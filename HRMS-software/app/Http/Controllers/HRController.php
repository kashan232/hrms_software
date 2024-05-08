<?php

namespace App\Http\Controllers;

use App\Models\Hr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HRController extends Controller
{
    public function add_hr()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.HR.add_hr', [
                // 'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }

        return view('');
    }
    public function store_hr(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Hr::create([
                'admin_or_user_id'    => $userId,
                'first_name'          => $request->first_name,
                'last_name'          => $request->last_name,
                'phone'          => $request->phone,
                'email'          => $request->email,
                'user_name'          => $request->user_name,
                'password'          => $request->password,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('department-added', 'Department Added Successfully');
        } else {
            return redirect()->back();
        }
    }
}
