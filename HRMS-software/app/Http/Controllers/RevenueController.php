<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevenueController extends Controller
{
    public function all_revenue()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_revenue = Revenue::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.revenue.all_revenue', [
                'all_revenue' => $all_revenue,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function add_revenue()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('admin_panel.revenue.add_revenue', [
            ]);
        } else {
            return redirect()->back();
        }

        return view('');
    }
    public function store_revenue(Request $request)
    {
        if (Auth::id()){
            $userId = Auth::id();
            $userType = Auth::user()->usertype;
            // Create the employee record
            // dd($request);
            $revenue = Revenue::create([
                'admin_or_user_id' => $userId,
                'usertype' => $userType, // Adding usertype to the database
                'date' => $request->date,
                'description' => $request->description,
                'Customer' => $request->Customer,
                'amount' => $request->amount,
                'tax' => $request->tax,
                'total_paid' => $request->total_paid,
                'status' => $request->status,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('revenue-added', 'Revenue Created Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function edit_revenue($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $Revenue = Revenue::where('id', '=', $id)->first();
            return view('admin_panel.revenue.edit_revenue', [
                'Revenue' => $Revenue,
            ]);

        } else {
            return redirect()->back();
        }
    }

    public function update_revenue(Request $request,$id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $userType = Auth::user()->usertype;
            // Create the employee record
            $Revenue = Revenue::where('id', '=', $id)->update([
                'date' => $request->date,
                'description' => $request->description,
                'Customer' => $request->Customer,
                'amount' => $request->amount,
                'tax' => $request->tax,
                'total_paid' => $request->total_paid,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('Revenue-updt', 'Revenue Updated Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function delete_revenue(Request $request, $id)
    {
        $delete = Revenue::find($id)->delete();
        return redirect()->back()->with('delete-message', 'Expense Has Been Deleted Successsfully');
    }
}
