<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\JobApplicationForm;
use App\Models\JobApplicationStatus;
use App\Models\JobBoard;
use App\Models\JobBoardDetail;
use App\Models\Quiz;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function store_job_board(Request $request)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $userType = Auth::user()->usertype;

            $JobBoard = JobBoard::create([
                'admin_or_user_id' => $userId,
                'usertype' => $userType, // Adding usertype to the database
                'department' => $request->department,
                'designation' => $request->designation,
                'job_title' => $request->job_title,
                'closing_date' => $request->closing_date,
                'vacancies' => $request->vacancies,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('hiring-added', 'hiring Created Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function all_job_board()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $all_job_boards = JobBoard::all();
            return view('hr_panel.job_board.all_job_boards', [
                'all_job_boards' => $all_job_boards,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function add_job_page(Request $request, $id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $Job_id = $id;
            $JobBoard = JobBoard::where('id', $Job_id)->first();
            // dd($JobBoard);
            $Departments = Department::get();

            return view('hr_panel.job_page.job_page', [
                'Departments' => $Departments,
                'JobBoard' => $JobBoard,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_job_page(Request $request)
    {
        // dd($request);   
        $JobBoardDetail = JobBoardDetail::create([
            'Job_id' => $request->if_of_job,
            'department' => $request->department,
            'designation' => $request->designation,
            'job_title' => $request->job_title,
            'required_skills' => $request->required_skills,
            'educational_requirement' => $request->educational_requirement,
            'job_description' => $request->job_description,
            'job_type' => $request->job_type,
            'job_position' => $request->job_position,
            'location' => $request->location,
            'important_notes' => $request->important_notes,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('hiring-added', 'hiring Created Successfully');

        return redirect()->route('jobs.index')->with('success', 'Job details stored successfully.');
    }

    public function job_applications()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $job_applications = JobApplicationForm::all();
            return view('hr_panel.job_applications.job_applications', [
                'job_applications' => $job_applications,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function approved_applications()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // Fetch approved applications using eager loading for efficiency
            $approvedApplications = JobApplicationForm::whereHas('statuses', function ($query) {
                $query->where('application_status', 'Approve');
            })->with('statuses')->get();
            // dd($approvedApplications);
            $quizzes = Quiz::all();
            return view('hr_panel.job_applications.approved_applications', [
                'approvedApplications' => $approvedApplications,
                'quizzes' => $quizzes,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function rejected_applications()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $RejectApplications = JobApplicationForm::whereHas('statuses', function ($query) {
                $query->where('application_status', 'Reject');
            })->with('statuses')->get();
            return view('hr_panel.job_applications.rejected_applications', [
                'RejectApplications' => $RejectApplications,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_job_applications(Request $request)
    {
        if (Auth::id()) {
            $status = JobApplicationStatus::create([
                'application_id' => $request->application_id,
                'application_status' => $request->application_status,
                'application_remarks' => $request->application_remarks,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->back()->with('status-added', 'Application Status Updated Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function view_applications($id)
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $job_application = JobApplicationForm::findOrFail($id);
            return view('hr_panel.job_applications.view_job_applications', [
                'job_application' => $job_application,
            ]);
        } else {
            return redirect()->back();
        }
    }

    
}
