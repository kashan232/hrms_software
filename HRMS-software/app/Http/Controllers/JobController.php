<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\JobApplicationForm;
use App\Models\JobBoard;
use App\Models\JobBoardDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function job_page()
    {
        $Departments = Department::withCount('jobBoards')->get();
        return view('Job_portal.main_job_page', [
            'Departments' => $Departments,
        ]);
    }

    public function job_listing($id)
    {
        // Get the department name based on the department id
        $Department = Department::find($id);

        // Fetch jobs where the department name matches
        $JobBoards = JobBoard::where('department', $Department->department)->get();

        return view('Job_portal.job_listing', [
            'JobBoards' => $JobBoards,
            'Department' => $Department,
        ]);
    }

    public function job_details($id)
    {
        // Fetch the job board based on the job_id
        $jobBoard = JobBoard::findOrFail($id);

        // Fetch job details or set it to null if it doesn't exist
        $jobDetails = JobBoardDetail::where('job_id', '=', $id)->first();

        // Check if job details are missing and handle accordingly
        if (!$jobDetails) {
            // Option 1: Redirect to another page if job details are missing
            return redirect()->back()->with('error', 'Job details not found');

            // Option 2: Render the view with job details as null
            return view('Job_portal.job_details', [
                'jobBoard' => $jobBoard,
                'jobDetails' => null,
            ]);
        }

        // Render the view with job details
        return view('Job_portal.job_details', [
            'jobBoard' => $jobBoard,
            'jobDetails' => $jobDetails,
        ]);
    }




    public function apply_job($id)
    {
        $job_id = $id;
        $jobBoard = JobBoard::findOrFail($id);
        return view('Job_portal.apply_job', ['jobBoard' => $jobBoard, 'job_id' => $job_id]);
    }

    public function submit(Request $request)
    {
        // dd($request);
        $request->validate([
            'application_post' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'linkedin' => 'nullable|url|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'degree_start_date' => 'required|date',
            'institution' => 'required|string|max:255',
            'institution_city' => 'required|string|max:255',
            'cgpa' => 'required|string|max:255',
            'latest_employer' => 'required|string|max:255',
            'business_industry' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'experience_start_date' => 'required|date',
            'responsibilities' => 'required|string',
            'skills' => 'required|string|max:255',
            'latest_salary' => 'required|string|max:255',
            'expected_salary' => 'required|string|max:255',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $resumeName = Str::random(10) . '.' . $resume->getClientOriginalExtension();
            $resume->move(public_path('job_resume'), $resumeName);

            // Find the job in job_boards table
            $job = JobBoard::find($request->Job_id);
            if ($job) {
                // Increment the total_applications field
                $job->total_applications = $job->total_applications + 1;
                $job->save();

                // Save the application in job_application_forms table
                JobApplicationForm::create([
                    'Job_id' => $request->Job_id,
                    'application_post' => $request->application_post,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'linkedin' => $request->linkedin,
                    'address' => $request->address,
                    'city' => $request->city,
                    'country' => $request->country,
                    'degree' => $request->degree,
                    'degree_start_date' => $request->degree_start_date,
                    'institution' => $request->institution,
                    'institution_city' => $request->institution_city,
                    'cgpa' => $request->cgpa,
                    'latest_employer' => $request->latest_employer,
                    'business_industry' => $request->business_industry,
                    'designation' => $request->designation,
                    'experience_start_date' => $request->experience_start_date,
                    'responsibilities' => $request->responsibilities,
                    'skills' => $request->skills,
                    'latest_salary' => $request->latest_salary,
                    'expected_salary' => $request->expected_salary,
                    'resume' => $resumeName, // Save resume name to the database
                    'status' => 'Application Recevied',

                ]);

                return response()->json(['message' => 'Your application is successfully sent.'], 200);
            } else {
                return response()->json(['message' => 'Job not found.'], 404);
            }
        }

        return response()->json(['message' => 'An error occurred while submitting your application.'], 500);
    }
}
