<?php

namespace App\Http\Controllers;

use App\Models\CRMExperience;
use App\Models\CRMInsurance;
use App\Models\CRMSalaire;
use App\Models\CRMSkill;
use App\Models\CRMSuggestion;
use App\Models\CRMTraininge;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CMRController extends Controller
{
    public function employee_cmr()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $employee_name = Auth()->user()->name;

            // dd($userId);
            $CRMSkills = CRMSkill::where('admin_or_user_id', '=', $userId)->where('employee_name', '=', $employee_name)->get();
            $CRMSalaires = CRMSalaire::where('admin_or_user_id', '=', $userId)->where('employee_name', '=', $employee_name)->get();
            $CRMInsurances = CRMInsurance::where('admin_or_user_id', '=', $userId)->where('employee_name', '=', $employee_name)->get();
            $CRMTraininges = CRMTraininge::where('admin_or_user_id', '=', $userId)->where('employee_name', '=', $employee_name)->get();
            $CRMExperiences = CRMExperience::where('admin_or_user_id', '=', $userId)->where('employee_name', '=', $employee_name)->get();
            $CRMSuggestions = CRMSuggestion::where('admin_or_user_id', '=', $userId)->where('employee_name', '=', $employee_name)->get();

            return view('employee_panel.crm.employee_crm', [
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
            // dd($userId);
            return view('employee_panel.crm.employee_cmr_add_skills', []);
        } else {
            return redirect()->back();
        }
    }
    public function store_employee_cmr_add_skills(Request $request)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $employee_name = Auth()->user()->name;
            $userId = Auth::id();
            CRMSkill::create([
                'admin_or_user_id' => $userId,
                'employee_name' => $employee_name,
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
            // dd($userId);
            return view('employee_panel.crm.employee_cmr_add_insurance', []);
        } else {
            return redirect()->back();
        }
    }

    public function store_employee_cmr_add_insurance(Request $request)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $employee_name = Auth()->user()->name;
            $userId = Auth::id();
            CRMInsurance::create([
                'admin_or_user_id' => $userId,
                'employee_name' => $employee_name,
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
            // dd($userId);
            return view('employee_panel.crm.employee_cmr_add_training', []);
        } else {
            return redirect()->back();
        }
    }

    public function store_employee_cmr_add_training(Request $request)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $employee_name = Auth()->user()->name;
            $userId = Auth::id();
            CRMTraininge::create([
                'admin_or_user_id' => $userId,
                'employee_name' => $employee_name,
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
            // dd($userId);
            return view('employee_panel.crm.employee_cmr_add_experience', []);
        } else {
            return redirect()->back();
        }
    }

    public function store_employee_cmr_add_experience(Request $request)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $employee_name = Auth()->user()->name;
            $userId = Auth::id();
            CRMExperience::create([
                'admin_or_user_id' => $userId,
                'employee_name' => $employee_name,
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
            return view('employee_panel.crm.employee_cmr_add_salaires', []);
        } else {
            return redirect()->back();
        }
    }

    public function store_employee_cmr_add_salaires(Request $request)
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $employee_name = Auth()->user()->name;
            $userId = Auth::id();
            CRMSalaire::create([
                'admin_or_user_id' => $userId,
                'employee_name' => $employee_name,
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
            return view('employee_panel.crm.employee_cmr_add_suggestion', []);
        } else {
            return redirect()->back();
        }
    }

    public function store_employee_cmr_add_suggestion(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $employee_name = Auth()->user()->name;
            $userId = Auth::id();
            CRMSuggestion::create([
                'admin_or_user_id' => $userId,
                'employee_name' => $employee_name,
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
