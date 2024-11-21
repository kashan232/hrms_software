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

    public function editQuiz($id)
    {
        // Find the quiz by ID
        $quiz = Quiz::findOrFail($id);

        // Fetch all departments for dropdown
        $departments = Department::all();

        // Pass the quiz data to the view
        return view('admin_panel.quiz_creation.quiz_edit', [
            'quiz' => $quiz,
            'Departments' => $departments
        ]);
    }

    public function updateQuiz(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        // Update the quiz data
        $quiz->department = $request->input('department');
        $quiz->designation = $request->input('designation');
        $quiz->job_title = $request->input('job_title');
        $quiz->question = $request->input('questions')[0]['question'];
        $quiz->option_a = $request->input('questions')[0]['options'][0];
        $quiz->option_b = $request->input('questions')[0]['options'][1];
        $quiz->option_c = $request->input('questions')[0]['options'][2];
        $quiz->option_d = $request->input('questions')[0]['options'][3];
        $quiz->right_option = $request->input('questions')[0]['right_option'];

        $quiz->save();

        return redirect()->back()->with('success', 'Quiz updated successfully');

    }
}
