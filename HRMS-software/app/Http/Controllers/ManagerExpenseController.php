<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerExpenseController extends Controller
{
    public function manager_all_expense()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_expense = Expense::where('admin_or_user_id', '=', $userId)->get();
            return view('manager_panel.expense.manager_all_expense', [
                'all_expense' => $all_expense,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function manager_add_expense()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            return view('manager_panel.expense.manager_add_expense', [
            ]);
        } else {
            return redirect()->back();
        }

        return view('');
    }
    public function manager_store_expense(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // Create the employee record
            $employee = Expense::create([
                'admin_or_user_id' => $userId,
                'date' => $request->date,
                'description' => $request->description,
                'vendor' => $request->vendor,
                'amount' => $request->amount,
                'tax' => $request->tax,
                'total_paid' => $request->total_paid,
                'status' => $request->status,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('expense-added', 'Expense Created Successfully');
        } else {
            return redirect()->back();
        }
    }
}
