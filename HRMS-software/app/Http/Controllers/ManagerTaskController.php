<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerTaskController extends Controller
{
    public function manager_task()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $emp_id = auth()->user()->emp_id;
            $all_project = Project::where('asign_managers', '=', $emp_id)->get();
            $all_employee = Employee::where('reporting_manager', $emp_id)->get();
            $all_task = Task::where('admin_or_user_id', $userId)->get();
            $all_department = Department::all();
            $all_designation = Designation::all();
            return view('manager_panel.task.manager_task', [
                'all_project' => $all_project,
                'all_employee' => $all_employee,
                'all_task' => $all_task,
                'all_department' => $all_department,
                'all_designation' => $all_designation,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function manager_add_task()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_project = Project::all();
            $emp_id = auth()->user()->emp_id;
            $all_employee = Employee::where('reporting_manager', $emp_id)->get();
            $all_task = Task::where('admin_or_user_id', $userId)->get();
            $all_department = Department::all();
            $all_designation = Designation::all();
            return view('manager_panel.task.manager_add_task', [
                'all_project' => $all_project,
                'all_employee' => $all_employee,
                'all_task' => $all_task,
                'all_department' => $all_department,
                'all_designation' => $all_designation,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function manager_store_task(Request $request)
    {
        if (Auth::check()) {
            // dd($request);
            $user = Auth::user();
            $userId = $user->id;
            $usertype = $user->usertype;
            $name = $user->name;
            $employeeId = $user->emp_id;

            // Fetch department and designation from the request
            $department = $request->department;
            $designation = $request->designation;

            $task = Task::create([
                'admin_or_user_id'     => $userId,
                'usertype'             => $usertype, // Adding usertype to the database
                'user_name'            => $name, // Adding username to the database
                'emp_id'               => $employeeId, // Adding employee ID to the database
                'project_name'         => $request->project_name,
                'task_category'        => $request->task_category,
                'start_date'           => $request->start_date,
                'end_date'             => $request->end_date,
                'department'           => $department,
                'designation'          => $designation,
                'task_assign_person'   => $request->task_assign_person,
                'task_priority'        => $request->task_priority,
                'description'          => $request->description,
                'status'               => 'In Process', // Setting status directly here
                'created_at'           => now(),
                'updated_at'           => now(),
            ]);

            return redirect()->back()->with('task-added', 'Task Added Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function manager_update_task(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $userId = $user->id;
            $usertype = $user->usertype;
            $name = $user->name;
            $employeeId = $user->emp_id;
            // Find the task by ID
            $task = Task::find($request->task_id);
            // Update the task details
            $task->admin_or_user_id = $userId;
            $task->usertype = $usertype;
            $task->user_name = $name;
            $task->emp_id = $employeeId;
            $task->project_name = $request->project_name;
            $task->task_category = $request->task_category;
            $task->start_date = $request->start_date;
            $task->end_date = $request->end_date;
            $task->department = $request->department;
            $task->designation = $request->designation;
            $task->task_assign_person = $request->task_assign_person;
            $task->task_priority = $request->task_priority;
            $task->description = $request->description;
            $task->updated_at = now();
            // Save the updated task
            $task->save();

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Task updated successfully!');
        } else {
            return redirect()->back();
        }
    }

    public function delete_manager_task(Request $request, $id)
    {
        $delete = Task::find($id)->delete();
        return redirect()->back()->with('success', 'Task Has Been Deleted Successsfully');
    }

}
