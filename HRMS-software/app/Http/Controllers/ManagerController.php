<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function add_manager()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.manager.add_manager', [
                // 'all_department' => $all_department,
            ]);
        } else {
            return redirect()->back();
        }

        return view('');
    }
    public function store_manager(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            $managercreae = Manager::create([
                'admin_or_user_id'    => $userId,
                'first_name'          => $request->first_name,
                'last_name'          => $request->last_name,
                'designation'          => $request->designation,
                'phone'          => $request->phone,
                'email'          => $request->email,
                'user_name'          => $request->user_name,
                'password'          => $request->password,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);

            // Create a user record with the same credentials and usertype 'employee'
            $user = User::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'emp_id' => $managercreae->id, // Set the emp_id to the newly created employee's id
                'email' => $request->email,
                'password' => bcrypt($request->password), // Make sure to hash the password
                'usertype' => 'manager', // Set the usertype to 'employee'
            ]);

            return redirect()->back()->with('manager-added', 'Manager Added Successfully');
        } else {
            return redirect()->back();
        }
    }
    public function all_manager()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_manager = Manager::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.manager.all_manager', [
                'all_manager' => $all_manager,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function edit_manager(Request $request, $id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $managerdetails = Manager::findOrFail($id);
            return view('admin_panel.manager.edit_manager', [
                // 'all_department' => $all_department,
                'managerdetails' => $managerdetails,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function update_manager(Request $request, $id)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            Manager::where('id', $id)->update([
                'admin_or_user_id'    => $userId,
                'first_name'          => $request->first_name,
                'last_name'          => $request->last_name,
                'designation'          => $request->designation,
                'phone'          => $request->phone,
                'email'          => $request->email,
                'user_name'          => $request->user_name,
                'password'          => $request->password,
                'updated_at' => Carbon::now(),
            ]);
            return Redirect()->back()->with('success-message-updte', 'Manager Updated successfully!');
        } else {
            return redirect()->back();
        }
    }
}
