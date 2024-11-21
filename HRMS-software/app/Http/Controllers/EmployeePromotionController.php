<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeePromotion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeePromotionController extends Controller
{
    public function hr_promotion()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_department = Department::all();
            $Employees = Employee::all();
            return view('hr_panel.employee_promotion.add_employee_promotion', [
                'all_department' => $all_department,
                'Employees' => $Employees,
            ]);
        } else {
            return redirect()->back();
        }

        return view('');
    }
    public function store_hr_promotion(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            $OfferLetters = EmployeePromotion::create([
                'admin_or_user_id'    => $userId,
                'employee_name'          => $request->employee_name,
                'curent_position'          => $request->curent_position,
                'new_position'          => $request->new_position,
                'department'          => $request->department,
                'designation'          => $request->designation,
                'new_salary'          => $request->new_salary,
                'date'          => $request->date,
                'jobDescription'          => $request->jobDescription,
                'additionalNotes'          => $request->additionalNotes,
                'created_by'          => $usertype,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('promotion-added', 'Employee Promotion Created Successfully');
        } else {
            return redirect()->back();
        }
    }
    public function hr_all_promotion()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $usertype = Auth()->user()->usertype;
            $EmployeePromotions = EmployeePromotion::where('admin_or_user_id', '=', $userId)->where('created_by', '=', $usertype)->get();
            return view('hr_panel.employee_promotion.all_employee_promotion', [
                'EmployeePromotions' => $EmployeePromotions,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        $promotion = EmployeePromotion::findOrFail($id);
        $promotion->update($request->all());
        return redirect()->back()->with('success', 'Promotion updated successfully');
    }

    public function destroy($id)
    {
        $promotion = EmployeePromotion::findOrFail($id);
        $promotion->delete();
        return response()->json(['success' => 'Promotion deleted successfully']);
    }
}
