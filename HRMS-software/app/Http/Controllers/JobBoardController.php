<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobBoardController extends Controller
{
    public function add_job_board()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $Departments = Department::get();

            return view('hr_panel.job_board.job_board', [
                'Departments' => $Departments,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
