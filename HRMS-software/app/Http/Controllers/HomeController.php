<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                return view('dashboard');
            } else if ($usertype == 'admin') {
                return view('admin_panel.admin_dashboard');
            } else if ($usertype == 'employee') {
                return view('employee_panel.employee_dashboard');
            } else if ($usertype == 'hr') {
                return view('hr_panel.hr_dashboard');
            } else if ($usertype == 'manager') {
                return view('manager_panel.manager_dashboard');
            }
        } else {
            // return redirect()->back();

            return Redirect()->route('login');
        }
    }
    public function adminpage()
    {
        // $departCount = Department::count();

        return view('admin_panel.admin_dashboard', 
        // ['departCount' => $departCount]
    );
    }
}
