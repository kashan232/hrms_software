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
        $userId = Auth::id();
        $questions = $request->input('questions');
    
        foreach ($questions as $questionData) {
            $quiz = new Quiz([
                'admin_or_user_id' => $userId,
                'department' => $request->input('department'),
                'designation' => $request->input('designation'),
                'job_title' => $request->input('job_title'),
                'question' => $questionData['question'],
                'option_a' => $questionData['options'][0],
                'option_b' => $questionData['options'][1],
                'option_c' => $questionData['options'][2],
                'option_d' => $questionData['options'][3],
                'right_option' => $questionData['right_option'],
            ]);
    
            $quiz->save();
        }
    
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
