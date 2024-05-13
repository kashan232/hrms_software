<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeTaskUpdateController extends Controller
{
    public function employee_task_update()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_task = Task::all();
            return view('admin_panel.employee_task.employee_task', [
                'all_task' => $all_task,
            ]);
        } else {
            return redirect()->back();
        }
    }
}
