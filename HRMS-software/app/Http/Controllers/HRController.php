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
            return redirect()->back()->with('hr-added', 'HR Added Successfully');
        } else {
            return redirect()->back();
        }
    }
    public function all_hr()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_hr = Hr::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.HR.all_hr', [
                'all_hr' => $all_hr,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function edit_hr(Request $request, $id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            $hrdetails = Hr::findOrFail($id);
            return view('admin_panel.HR.edit_hr', [
                // 'all_department' => $all_department,
                'hrdetails' => $hrdetails,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function update_hr(Request $request, $id)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Hr::where('id', $id)->update([
                'admin_or_user_id'    => $userId,
                'first_name'          => $request->first_name,
                'last_name'          => $request->last_name,
                'phone'          => $request->phone,
                'email'          => $request->email,
                'user_name'          => $request->user_name,
                'password'          => $request->password,
                'updated_at' => Carbon::now(),
            ]);
            return Redirect()->back()->with('success-message-updte', 'HR Updated successfully!');
        } else {
            return redirect()->back();
        }
    }
}
