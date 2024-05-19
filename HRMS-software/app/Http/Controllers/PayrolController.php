<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PayrolSalary;
use Carbon\Carbon;
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

    public function post_create_salary(Request $request)
    {
        if (Auth::id()) {
            // dd($request);
            $userId = Auth::id();


            // Split the employee_id field to get the ID and name
            $employeeData = explode(' ', $request->employee_id, 2);
            $employeeId = $employeeData[0];
            $employeeName = $employeeData[1];

            // dd($employeeId,$employeeName);
            // Prepare the allowances and deductions as JSON
            $allowances = [];
            $deductions = [];

            if ($request->has('allowanceDescription') && $request->has('allowanceName')) {
                foreach ($request->allowanceDescription as $index => $description) {
                    $allowances[] = [
                        'name' => $description,
                        'amount' => $request->allowanceName[$index]
                    ];
                }
            }

            if ($request->has('deductionDescription') && $request->has('deductionName')) {
                foreach ($request->deductionDescription as $index => $description) {
                    $deductions[] = [
                        'name' => $description,
                        'amount' => $request->deductionName[$index]
                    ];
                }
            }

            // Create the salary record
            $PayrolSalary = PayrolSalary::create([
                'emp_id' => $employeeId,
                'employee_name' => $employeeName,
                'department' => $request->department,
                'designation' => $request->designation,
                'salary_month' => $request->salary_month,
                'salary_paid_date' => $request->salary_paid_date,
                'basic_salary' => $request->basic_salary,
                'total_allowances' => $request->total_allowances,
                'total_deductions' => $request->total_deductions,
                'net_salary' => $request->net_salary,
                'allowances' => json_encode($allowances),
                'deductions' => json_encode($deductions),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('success', 'Salary Created Successfully');
        } else {
            return redirect()->back()->with('error', 'Unauthorized Access');
        }
    }

    public function generate_salary()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $salaries = PayrolSalary::All();
            // dd($employees);
            return view('hr_panel.payrol_salary.generate_salary', [
                'salaries' => $salaries,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function printSalary($id)
    {
        $salary = PayrolSalary::findOrFail($id);

        return view('hr_panel.payrol_salary.print_salary', [
            'salary' => $salary,
        ]);
    }
}
