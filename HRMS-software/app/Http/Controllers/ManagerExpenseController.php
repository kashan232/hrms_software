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
            $emp_id = Auth()->user()->emp_id;

            $all_expense = Expense::where('userId', '=', $emp_id)->get();
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
            return view('manager_panel.expense.manager_add_expense', []);
        } else {
            return redirect()->back();
        }

        return view('');
    }
    public function manager_store_expense(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $userType = Auth::user()->usertype;
            $emp_id = Auth()->user()->emp_id;

            // Initialize receipt file name variable
            $receiptFileName = null;

            // Check if a file was uploaded and handle the upload
            if ($request->hasFile('receipt')) {
                $file = $request->file('receipt');
                // Create a unique file name based on current time and original file name
                $fileName = time() . '_' . $file->getClientOriginalName();
                // Store the file in the 'public/receipts' directory
                $file->move(public_path('receipts'), $fileName); // Move file to public/receipts
                $receiptFileName = $fileName; // Store only the file name for the database
            }

            // Create the expense record with receipt file name
            Expense::create([
                'admin_or_user_id' => $userId,
                'userId' => $emp_id,
                'usertype' => $userType,
                'date' => $request->date,
                'description' => $request->description,
                'vendor' => $request->vendor,
                'amount' => $request->amount,
                'tax' => $request->tax,
                'total_paid' => $request->total_paid,
                'status' => $request->status,
                'receipt' => $receiptFileName, // Store only the receipt file name in database
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('expense-added', 'Expense Created Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function updateExpense(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);
        // dd($expense);
        // Handle receipt file update
        $receiptFileName = $expense->receipt; // Keep the old filename by default
        if ($request->hasFile('receipt')) {
            // If a new receipt file is uploaded
            $file = $request->file('receipt');
            $receiptFileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('receipts'), $receiptFileName);
        }

        // Update the expense record
        $expense->update([
            'date' => $request->date,
            'description' => $request->description,
            'vendor' => $request->vendor,
            'amount' => $request->amount,
            'tax' => $request->tax,
            'total_paid' => $request->total_paid,
            'status' => $request->status,
            'receipt' => $receiptFileName, // Update with new or old filename
        ]);

        return redirect()->back()->with('success-message', 'Expense updated successfully');

    }

    public function deleteExpense($id)
    {
        $expense = Expense::findOrFail($id);

        // Optionally, you can delete the receipt file if it exists
        if ($expense->receipt && file_exists(public_path('receipts/' . $expense->receipt))) {
            unlink(public_path('receipts/' . $expense->receipt));
        }

        // Delete the expense record
        $expense->delete();

        return redirect()->back()->with('delete-message', 'Expense deleted successfully');
    }
}
