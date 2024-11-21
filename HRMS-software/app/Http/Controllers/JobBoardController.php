<?php

namespace App\Http\Controllers;

use App\Models\CandidateQuizAssignment;
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
use App\Mail\QuizAssignmentMail;
use App\Models\CandidateSubmitQuiz;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

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
            $JobBoardDetail = JobBoardDetail::where('Job_id', $Job_id)->first();
            // dd($JobBoardDetail);
            $Departments = Department::get();

            return view('hr_panel.job_page.job_page', [
                'Departments' => $Departments,
                'JobBoard' => $JobBoard,
                'JobBoardDetail' => $JobBoardDetail,
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
            $approvedApplications = JobApplicationForm::where('status', 'Application Recevied')->get();
            return view('hr_panel.job_applications.job_applications', [
                'approvedApplications' => $approvedApplications,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function approved_applications()
    {
        if (Auth::id()) {
            $userId = Auth::id();

            $approvedApplications = JobApplicationForm::whereHas('statuses', function ($query) {
                $query->where('application_status', 'Approved')
                    ->latest('created_at'); // Only consider the latest status entry
            })
                ->with(['statuses' => function ($query) {
                    $query->latest('created_at'); // Get the latest status record
                }, 'jobBoard'])
                ->get();

            return view('hr_panel.job_applications.approved_applications', [
                'approvedApplications' => $approvedApplications,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function getQuizzes(Request $request)
    {
        $department = $request->department;
        $designation = $request->designation;
        $jobTitle = $request->jobTitle;

        $quizzes = Quiz::where('department', $department)
            ->where('designation', $designation)
            ->where('job_title', $jobTitle)
            ->get();

        return response()->json($quizzes);
    }


    public function assignQuiz(Request $request)
    {
        $assignment = new CandidateQuizAssignment();
        $assignment->candidate_name = $request->candidate_name;
        $assignment->email = $request->email; // Assuming you are also storing the email
        $assignment->department = $request->department;
        $assignment->designation = $request->designation;
        $assignment->job_title = $request->job_title;
        $assignment->username = $request->username;
        $assignment->password = bcrypt($request->password);
        $assignment->questions = json_encode($request->questions);
        $assignment->save();

        // Email details
        $candidateEmail = $request->email;
        $hrEmail = 'hr@example.com'; // Replace with HR's email
        $subject = 'Quiz Assignment';
        $link = route('quizze-atempt-login'); // Replace with your actual route

        $message = "Dear {$request->candidate_name},\n\n";
        $message .= "You have been assigned a quiz. Please use the following credentials to log in and attempt the quiz:\n\n";
        $message .= "Username: {$request->username}\n";
        $message .= "Password: {$request->password}\n\n";
        $message .= "Quiz Link: {$link}\n\n";
        $message .= "Best regards,\nHR Team";

        // Send email
        Mail::raw($message, function ($mail) use ($candidateEmail, $hrEmail, $subject) {
            $mail->to($candidateEmail)
                ->cc($hrEmail)
                ->subject($subject);
        });

        // Return a response
        return response()->json(['message' => 'Quiz assigned successfully and email sent'], 200);
    }


    public function getQuizResults($applicationId)
    {
        // Step 1: Fetch the job application by id and get the candidate details
        $jobApplication = JobApplicationForm::where('id', $applicationId)->first(['email', 'first_name', 'last_name']);

        if ($jobApplication) {
            $candidateName = $jobApplication->first_name . ' ' . $jobApplication->last_name;
            $email = $jobApplication->email;

            // Step 2: Match the candidate name and email with candidate_quiz_assignments table to get the quiz assignment id
            $quizAssignment = CandidateQuizAssignment::where('candidate_name', $candidateName)
                ->where('email', $email)
                ->first('id');

            if ($quizAssignment) {
                // Step 3: Use the quiz assignment id to fetch the quiz results from candidate_submit_quizzes table
                $quizResults = CandidateSubmitQuiz::where('candidate_id', $quizAssignment->id)->get();

                return response()->json($quizResults);
            } else {
                return response()->json(['error' => 'Quiz assignment not found'], 404);
            }
        } else {
            return response()->json(['error' => 'Job application not found'], 404);
        }
    }

    public function hireCandidate($id)
    {
        $application = JobApplicationForm::find($id);

        if ($application) {
            // Update the application status to hired
            $application->status = 'Final Interview';
            $application->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Application not found']);
    }

    public function quizze_atempt_login()
    {
        return view('quiz_attempt_screen.quiz_login', []);
    }

    public function quizze_atempt(Request $request)
    {
        $candidateId = session('candidate_id');
        $assignment = CandidateQuizAssignment::where('id', $candidateId)->first();

        if (!$assignment) {
            return redirect()->route('quizze-atempt-login')->withErrors(['Please log in to access the quiz.']);
        }

        // If the request is to submit the quiz
        if ($request->isMethod('post')) {
            $userAnswers = $request->input('answers', []);
            $questionIds = json_decode($assignment->questions);
            $questions = Quiz::whereIn('id', $questionIds)->get();

            $totalCorrect = 0;
            $results = [];

            foreach ($questions as $question) {
                $userAnswer = $userAnswers[$question->id] ?? 'No Answer';
                $isCorrect = $userAnswer === $question->correct_option;

                if ($isCorrect) {
                    $totalCorrect++;
                }

                $results[] = [
                    'question_text' => $question->question,
                    'user_answer' => $userAnswer,
                    'correct_answer' => $question->correct_option,
                    'is_correct' => $isCorrect,
                ];
            }

            // Pass results to the view
            return view('quiz_attempt_screen.quiz_atempt', [
                'candidate' => $assignment,
                'questions' => $questions,
                'totalCorrect' => $totalCorrect,
                'totalQuestions' => count($questions),
                'results' => $results,
            ]);
        }

        // If it's a GET request, show the quiz form
        $questionIds = json_decode($assignment->questions);
        $questions = Quiz::whereIn('id', $questionIds)->get();


        return view('quiz_attempt_screen.quiz_atempt', [
            'candidate' => $assignment,
            'questions' => $questions,
        ]);
    }

    // public function submitQuiz(Request $request)
    // {
    //     $candidateId = session('candidate_id');
    //     $assignment = CandidateQuizAssignment::where('id', $candidateId)->first();

    //     if (!$assignment) {
    //         return response()->json(['error' => 'Assignment not found'], 404);
    //     }

    //     if ($assignment->is_attempted) {
    //         return response()->json(['error' => 'You have already attempted this quiz'], 403);
    //     }

    //     $questionIds = json_decode($assignment->questions);
    //     $questions = Quiz::whereIn('id', $questionIds)->get();
    //     $correctAnswers = [];
    //     $totalCorrect = 0;

    //     foreach ($questions as $question) {
    //         $correctAnswers[$question->id] = $question->right_option;
    //     }

    //     $userAnswers = $request->input('answers');
    //     $results = [];

    //     foreach ($userAnswers as $questionId => $answer) {
    //         $isCorrect = $answer === $correctAnswers[$questionId];
    //         if ($isCorrect) {
    //             $totalCorrect++;
    //         }
    //         $results[] = [
    //             'question_id' => $questionId,
    //             'user_answer' => $answer,
    //             'correct_answer' => $correctAnswers[$questionId],
    //             'is_correct' => $isCorrect
    //         ];
    //     }

    //     // Save results to the database
    //     foreach ($results as $result) {
    //         CandidateSubmitQuiz::create([
    //             'candidate_id' => $candidateId,
    //             'question_id' => $result['question_id'],
    //             'user_answer' => $result['user_answer'],
    //             'correct_answer' => $result['correct_answer'],
    //             'is_correct' => $result['is_correct']
    //         ]);
    //     }

    //     // Update the assignment to indicate the quiz has been attempted
    //     $assignment->is_attempted = true;
    //     $assignment->save();

    //     return response()->json([
    //         'totalCorrect' => $totalCorrect,
    //         'totalQuestions' => count($questions),
    //         'results' => $results
    //     ]);
    // }

    public function submitQuiz(Request $request)
    {
        $candidateId = session('candidate_id');
        $assignment = CandidateQuizAssignment::where('id', $candidateId)->first();

        if (!$assignment) {
            return response()->json(['error' => 'Assignment not found'], 404);
        }

        if ($assignment->is_attempted) {
            return response()->json(['error' => 'You have already attempted this quiz'], 403);
        }

        $questionIds = json_decode($assignment->questions);
        $questions = Quiz::whereIn('id', $questionIds)->get()->keyBy('id'); // Key by id for easy access
        $correctAnswers = [];
        $totalCorrect = 0;

        foreach ($questions as $question) {
            $correctAnswers[$question->id] = $question->right_option;
        }

        $userAnswers = $request->input('answers');
        $results = [];

        foreach ($userAnswers as $questionId => $answer) {
            $isCorrect = $answer === $correctAnswers[$questionId];
            if ($isCorrect) {
                $totalCorrect++;
            }

            $results[] = [
                'question_id' => $questionId,
                'question_text' => $questions[$questionId]->question, // Include question text
                'user_answer' => $answer,
                'correct_answer' => $correctAnswers[$questionId],
                'is_correct' => $isCorrect
            ];
        }

        // Save results to the database
        foreach ($results as $result) {
            CandidateSubmitQuiz::create([
                'candidate_id' => $candidateId,
                'question_id' => $result['question_id'],
                'user_answer' => $result['user_answer'],
                'correct_answer' => $result['correct_answer'],
                'is_correct' => $result['is_correct']
            ]);
        }

        // Update the assignment to indicate the quiz has been attempted
        $assignment->is_attempted = true;
        $assignment->save();

        return response()->json([
            'totalCorrect' => $totalCorrect,
            'totalQuestions' => count($questions),
            'results' => $results
        ]);
    }




    public function candidate_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $candidate = CandidateQuizAssignment::where('username', $request->username)->first();

        if ($candidate && Hash::check($request->password, $candidate->password)) {
            // Check if the candidate has already attempted the quiz
            if ($candidate->is_attempted == 1) {
                return back()->withErrors(['message' => 'You have already attempted the quiz.']);
            }

            // Credentials are correct and candidate has not attempted the quiz
            // Store candidate information in session
            session(['candidate_id' => $candidate->id]);

            // Redirect to the quiz attempt page
            return redirect()->route('quizze-atempt');
        } else {
            // Credentials are incorrect
            return back()->withErrors(['message' => 'Invalid username or password']);
        }
    }


    public function candidate_logout(Request $request)
    {
        // Clear candidate session data
        $request->session()->forget('candidate_id');
        $request->session()->flush();

        // Redirect to the candidate login page
        return redirect()->route('quizze-atempt-login');
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

    public function Intervied_applications()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $interviewApplications = JobApplicationForm::whereHas('statuses', function ($query) {
                $query->where('status', 'Final Interview');
            })->with('statuses')->get();
            return view('hr_panel.job_applications.intervied_applications', [
                'interviewApplications' => $interviewApplications,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function hired_applications()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $hiredApplications = JobApplicationForm::whereHas('statuses', function ($query) {
                $query->where('status', 'hired');
            })->with('statuses')->get();
            return view('hr_panel.job_applications.hired_applications', [
                'hiredApplications' => $hiredApplications,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function updateInterviewStatus(Request $request, $applicationId)
    {
        $application = JobApplicationForm::find($applicationId);

        if (!$application) {
            return response()->json(['success' => false, 'message' => 'Application not found.']);
        }

        // Update the application status based on the checkbox
        $application->status = 'hired';

        $application->save();

        return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
    }


    public function store_job_applications(Request $request)
    {
        if (Auth::id()) {
            // Update the status in the job_application_forms table
            $jobApplicationForm = JobApplicationForm::find($request->application_id);

            if ($jobApplicationForm) {
                $jobApplicationForm->status = $request->application_status;
                $jobApplicationForm->save();

                // Create a record in the JobApplicationStatus table
                JobApplicationStatus::create([
                    'application_id' => $request->application_id,
                    'application_status' => $request->application_status,
                    'application_remarks' => $request->application_remarks,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                return redirect()->back()->with('status-added', 'Application Status Updated Successfully');
            } else {
                return redirect()->back()->with('error', 'Application not found');
            }
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
