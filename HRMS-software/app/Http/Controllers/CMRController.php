<?php

namespace App\Http\Controllers;

use App\Models\CRMExperience;
use App\Models\CRMInsurance;
use App\Models\CRMSalaire;
use App\Models\CRMSkill;
use App\Models\CRMSuggestion;
use App\Models\CRMTraininge;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CMRController extends Controller
{

    public function seprate_employee_cmr()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $emp_id = Auth()->user()->emp_id;
            $activeTab = request()->get('tab', 'skills');

            // dd($userId);
            $CRMSkills = CRMSkill::where('emp_id', '=', $emp_id)->get();
            $CRMSalaires = CRMSalaire::where('emp_id', '=', $emp_id)->get();
            $CRMInsurances = CRMInsurance::where('emp_id', '=', $emp_id)->get();
            $CRMTraininges = CRMTraininge::where('emp_id', '=', $emp_id)->get();
            $CRMExperiences = CRMExperience::where('emp_id', '=', $emp_id)->get();
            $CRMSuggestions = CRMSuggestion::where('emp_id', '=', $emp_id)->get();

            return view('employee_panel.crm.seprate_employee_crm', [
                'CRMSkills' => $CRMSkills,
                'CRMSalaires' => $CRMSalaires,
                'CRMInsurances' => $CRMInsurances,
                'CRMTraininges' => $CRMTraininges,
                'CRMExperiences' => $CRMExperiences,
                'CRMSuggestions' => $CRMSuggestions,
                'activeTab' => $activeTab,
            ]);
            

        } else {
            return redirect()->back();
        }
    }

    public function seprate_employee_cmr_add_suggestion()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $emp_id = Auth()->user()->emp_id;
            $employees = Employee::where('id', '=', $emp_id)->first();
            // dd($employees);
            return view('employee_panel.crm.employee_cmr_add_suggestion', [
                'employees' => $employees,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function seprate_store_employee_cmr_add_suggestion(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
           
            $emp_id = Auth()->user()->emp_id;

            CRMSuggestion::create([
                'admin_or_user_id' => $userId,
                'emp_id' => $emp_id,
                'employee_name' => $request->employee_id,
                'department' => $request->department,
                'designation' => $request->designation,
                'Subject' => $request->Subject,
                'Complains' => $request->Complains,
                'Reference' => $request->Reference,
                'Status' => $request->Status,
                'Solution' => $request->Solution,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('Suggestion-added', 'Suggestion Added Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function employee_cmr()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $employee_name = Auth()->user()->name;

            // dd($userId);
            $CRMSkills = CRMSkill::where('admin_or_user_id', '=', $userId)->get();
            $CRMSalaires = CRMSalaire::where('admin_or_user_id', '=', $userId)->get();
            $CRMInsurances = CRMInsurance::where('admin_or_user_id', '=', $userId)->get();
            $CRMTraininges = CRMTraininge::where('admin_or_user_id', '=', $userId)->get();
            $CRMExperiences = CRMExperience::where('admin_or_user_id', '=', $userId)->get();
            $CRMSuggestions = CRMSuggestion::where('admin_or_user_id', '=', $userId)->get();

            return view('hr_panel.crm.employee_crm', [
                'CRMSkills' => $CRMSkills,
                'CRMSalaires' => $CRMSalaires,
                'CRMInsurances' => $CRMInsurances,
                'CRMTraininges' => $CRMTraininges,
                'CRMExperiences' => $CRMExperiences,
                'CRMSuggestions' => $CRMSuggestions,
            ]);
            

        } else {
            return redirect()->back();
        }
    }

    public function employee_cmr_add_skills()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $employees = Employee::All();
            // dd($userId);
            return view('hr_panel.crm.employee_cmr_add_skills', [
                'employees' => $employees,
            ]);
        } else {
            return redirect()->back();
        }
    }
    public function store_employee_cmr_add_skills(Request $request)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            // $employee_name = Auth()->user()->name;
            $employeeData = explode(' ', $request->employee_id, 2);
            $employeeId = $employeeData[0];
            $employeeName = $employeeData[1];
            $department = $request->department;
            $designation =$request->designation;

            CRMSkill::create([
                'admin_or_user_id' => $userId,
                'emp_id' => $employeeId,
                'employee_name' => $employeeName,
                'department' => $department,
                'designation' => $designation,
                'Skills' => $request->Skills,
                'Level' => $request->Level,
                'Experience' => $request->Experience,
                'Certification' => $request->Certification,
                'Institution' => $request->Institution,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('Skills-added', 'Skills Added Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function employee_cmr_add_insurance()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $employees = Employee::All();
            // dd($userId);
            return view('hr_panel.crm.employee_cmr_add_insurance', [
                'employees' => $employees,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_employee_cmr_add_insurance(Request $request)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            // $employee_name = Auth()->user()->name;
            $employeeData = explode(' ', $request->employee_id, 2);
            $employeeId = $employeeData[0];
            $employeeName = $employeeData[1];
            $department = $request->department;
            $designation =$request->designation;

            CRMInsurance::create([
                'admin_or_user_id' => $userId,
                'emp_id' => $employeeId,
                'employee_name' => $employeeName,
                'department' => $department,
                'designation' => $designation,
                'Insurance' => $request->Insurance,
                'Coverage' => $request->Coverage,
                'Start_Date' => $request->Start_Date,
                'End_Date' => $request->End_Date,
                'Amount' => $request->Amount,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('insurance-added', 'Insurance Added Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function employee_cmr_add_training()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $employees = Employee::All();
            // dd($userId);
            return view('hr_panel.crm.employee_cmr_add_training', [
                'employees' => $employees,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_employee_cmr_add_training(Request $request)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            // $employee_name = Auth()->user()->name;
            $employeeData = explode(' ', $request->employee_id, 2);
            $employeeId = $employeeData[0];
            $employeeName = $employeeData[1];
            $department = $request->department;
            $designation =$request->designation;

            CRMTraininge::create([
                'admin_or_user_id' => $userId,
                'emp_id' => $employeeId,
                'employee_name' => $employeeName,
                'department' => $department,
                'designation' => $designation,
                'Training' => $request->Training,
                'Purpose' => $request->Purpose,
                'Start_Date' => $request->Start_Date,
                'End_Date' => $request->End_Date,
                'Results' => $request->Results,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('Training-added', 'Training Added Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function employee_cmr_add_experience()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $employees = Employee::All();
            // dd($userId);
            return view('hr_panel.crm.employee_cmr_add_experience', [
                'employees' => $employees,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_employee_cmr_add_experience(Request $request)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            // $employee_name = Auth()->user()->name;
            $employeeData = explode(' ', $request->employee_id, 2);
            $employeeId = $employeeData[0];
            $employeeName = $employeeData[1];
            $department = $request->emp_department;
            $designation =$request->emp_designation;

            CRMExperience::create([
                'admin_or_user_id' => $userId,
                'emp_id' => $employeeId,
                'employee_name' => $employeeName,
                'emp_department' => $department,
                'emp_designation' => $designation,
                'Organization' => $request->Organization,
                'Designation' => $request->Designation,
                'Start_Date' => $request->Start_Date,
                'End_Date' => $request->End_Date,
                'Total_Experience' => $request->Total_Experience,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('Experience-added', 'Experience Added Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function employee_cmr_add_salaires()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $employees = Employee::All();

            return view('hr_panel.crm.employee_cmr_add_salaires', [
                'employees' => $employees,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_employee_cmr_add_salaires(Request $request)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            // $employee_name = Auth()->user()->name;
            $employeeData = explode(' ', $request->employee_id, 2);
            $employeeId = $employeeData[0];
            $employeeName = $employeeData[1];
            $department = $request->department;
            $designation =$request->designation;

            CRMSalaire::create([
                'admin_or_user_id' => $userId,
                'emp_id' => $employeeId,
                'employee_name' => $employeeName,
                'department' => $department,
                'designation' => $designation,
                'Month' => $request->Month,
                'Salaries' => $request->Salaries,
                'Other_Income' => $request->Other_Income,
                'Fines' => $request->Fines,
                'Total_Salaries' => $request->Total_Salaries,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('salaires-added', 'Salaires Added Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function employee_cmr_add_suggestion()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $employees = Employee::All();
            return view('hr_panel.crm.employee_cmr_add_suggestion', [
                'employees' => $employees,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_employee_cmr_add_suggestion(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            // $employee_name = Auth()->user()->name;
            $employeeData = explode(' ', $request->employee_id, 2);
            $employeeId = $employeeData[0];
            $employeeName = $employeeData[1];
            $department = $request->department;
            $designation =$request->designation;

            CRMSuggestion::create([
                'admin_or_user_id' => $userId,
                'emp_id' => $employeeId,
                'employee_name' => $employeeName,
                'department' => $department,
                'designation' => $designation,
                'Subject' => $request->Subject,
                'Complains' => $request->Complains,
                'Reference' => $request->Reference,
                'Status' => $request->Status,
                'Solution' => $request->Solution,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('Suggestion-added', 'Suggestion Added Successfully');
        } else {
            return redirect()->back();
        }
    }
}
