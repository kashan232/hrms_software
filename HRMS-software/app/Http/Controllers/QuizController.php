<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{

    public function Quiz_creation()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $Departments = Department::where('admin_or_user_id', '=', $userId)->get();
            return view('admin_panel.quiz_creation.quiz_creation', [
                'Departments' => $Departments,
            ]);
        } else {
            return redirect()->back();
        }
    }


    public function Quiz_store(Request $request)
    {
        // Log the incoming request for debugging

        $userId = Auth::id();

        // Save the incoming data to the database
        $quiz = new Quiz([
            'admin_or_user_id' => $userId,
            'department' => $request->department,
            'designation' => $request->designation,
            'job_title' => $request->job_title,
            'question' => $request->question,
            'option_a' => $request->options[0],
            'option_b' => $request->options[1],
            'option_c' => $request->options[2],
            'option_d' => $request->options[3],
            'right_option' => $request->right_option, // Save the text of the selected option
        ]);

        $quiz->save();

        return response()->json(['message' => 'Quiz saved successfully']);
    }

    public function all_quiz_creation()
    {
        // Get the logged-in user ID
        $userId = Auth::id();

        // Fetch the quizzes created by the logged-in user
        $quizzes = Quiz::where('admin_or_user_id', $userId)->get();

        // Return the quizzes to the view
        return view('admin_panel.quiz_creation.quiz_listing', [
            'quizzes' => $quizzes,
        ]);
    }
}
