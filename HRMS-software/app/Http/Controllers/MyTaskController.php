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
        // Check if the user is logged in
        if (Auth::check()) {
            // Get the ID of the currently logged-in user
            $userId = Auth::id();
            

            $name = Auth()->user()->name;
            $employeetasks = Task::where('task_assign_person', '=', $name)->get();
            // dd($employeetasks);
            return view('employee_panel.mytask.mytask', [
                'employeetasks' => $employeetasks,
            ]);
        } else {
            // If the user is not logged in, redirect back
            return redirect()->back();
        }
    }
    public function update_status(Request $request)
    {
        // Validate request data if necessary

        // Update task status
        $task = Task::findOrFail($request->task_id);
        $task->status = $request->status;
        $task->save();

        // Return success response
        return response()->json(['message' => 'Task status updated successfully']);
    }
}
