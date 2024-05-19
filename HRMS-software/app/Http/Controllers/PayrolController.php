<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayrolController extends Controller
{
    public function create_salary()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $employees = Employee::All();
            // dd($employees);
            return view('hr_panel.payrol_salary.create_payrol_salary', [
                'employees' => $employees,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
