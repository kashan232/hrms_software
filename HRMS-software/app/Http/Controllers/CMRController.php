<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CMRController extends Controller
{
    public function employee_cmr()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            return view('employee_panel.crm.employee_crm', [
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
            return view('employee_panel.crm.employee_cmr_add_skills', [
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function employee_cmr_add_insurance()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            return view('employee_panel.crm.employee_cmr_add_insurance', [
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function employee_cmr_add_training()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            return view('employee_panel.crm.employee_cmr_add_training', [
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function employee_cmr_add_experience()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            return view('employee_panel.crm.employee_cmr_add_experience', [
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function employee_cmr_add_salaires()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            return view('employee_panel.crm.employee_cmr_add_salaires', [
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function employee_cmr_add_suggestion()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            return view('employee_panel.crm.employee_cmr_add_suggestion', [
            ]);
        } else {
            return redirect()->back();
        }
    }
    
}
