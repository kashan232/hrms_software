<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyTaskController extends Controller
{
    public function mytask()
    {
        if (Auth::check()) {
            $name = Auth::user()->name;
            $employeetasks = Task::where('task_assign_person', '=', $name)->get();

            return view('employee_panel.mytask.mytask', [
                'employeetasks' => $employeetasks,
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    public function update_status(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'status' => 'required|in:Complete,Incomplete',
            'employee_description' => 'nullable|string|max:255'
        ]);

        $task = Task::findOrFail($request->task_id);
        $task->status = $request->status;

        if ($request->status == 'Complete' && $request->filled('employee_description')) {
            $task->employee_description = $request->employee_description;
        }

        $task->save();

        return response()->json(['message' => 'Task status updated successfully']);
    }
}
