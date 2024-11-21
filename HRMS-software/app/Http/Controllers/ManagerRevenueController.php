<?php

namespace App\Http\Controllers;

use App\Models\Revenue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerRevenueController extends Controller
{
    public function manager_all_revenue()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_revenue = Revenue::where('admin_or_user_id', '=', $userId)->get();
            return view('manager_panel.revenue.manager_all_revenue', [
                'all_revenue' => $all_revenue,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function manager_add_revenue()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('manager_panel.revenue.manager_add_revenue', [
            ]);
        } else {
            return redirect()->back();
        }

        return view('');
    }
    public function manager_store_revenue(Request $request)
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
}
