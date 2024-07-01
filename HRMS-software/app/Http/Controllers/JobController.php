<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    
    public function job_page()
    {
        // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
        return view('Job_portal.main_job_page', [
            // 'all_department' => $all_department,
        ]);
    }

    public function job_listing()
    {
        // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
        return view('Job_portal.job_listing', [
            // 'all_department' => $all_department,
        ]);
    }

    public function job_details()
    {
        // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
        return view('Job_portal.job_details', [
            // 'all_department' => $all_department,
        ]);
    }

    public function apply_job()
    {
        // $all_department = Department::where('admin_or_user_id', '=', $userId)->get();
        return view('Job_portal.apply_job', [
            // 'all_department' => $all_department,
        ]);
    }

}
