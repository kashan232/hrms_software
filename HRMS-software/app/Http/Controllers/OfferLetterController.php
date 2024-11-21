<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\JobApplicationForm;
use App\Models\OfferLetter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferLetterController extends Controller
{
    public function hr_offer_letter()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $all_department = Department::all();

            // Fetch candidates with status 'hired'
            $hiredCandidates = JobApplicationForm::where('status', 'hired')->get();

            return view('hr_panel.offer_letters.add_offer_letters', [
                'all_department' => $all_department,
                'hiredCandidates' => $hiredCandidates, // Pass the hired candidates to the view
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function store_hr_offer_letter(Request $request)
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            $userId = Auth::id();
            $OfferLetters = OfferLetter::create([
                'admin_or_user_id'    => $userId,
                'candidateName'          => $request->candidateName,
                'jobTitle'          => $request->jobTitle,
                'department'          => $request->department,
                'designation'          => $request->designation,
                'startDate'          => $request->startDate,
                'salary'          => $request->salary,
                'jobDescription'          => $request->jobDescription,
                'additionalNotes'          => $request->additionalNotes,
                'created_by'          => $usertype,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
            return redirect()->back()->with('offerletter-added', 'Offer letter Created Successfully');
        } else {
            return redirect()->back();
        }
    }
    public function hr_all_offer_letter()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            // dd($userId);
            $usertype = Auth()->user()->usertype;
            $OfferLetters = OfferLetter::where('admin_or_user_id', '=', $userId)->where('created_by', '=', $usertype)->get();
            return view('hr_panel.offer_letters.all_offer_letters', [
                'OfferLetters' => $OfferLetters,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $offerLetter = OfferLetter::find($request->id);
        $offerLetter->startDate = $request->startDate;
        $offerLetter->salary = $request->salary;
        $offerLetter->jobDescription = $request->jobDescription;
        $offerLetter->additionalNotes = $request->additionalNotes;
        $offerLetter->save();

        return redirect()->back()->with('success', 'Offer Letter updated successfully.');
    }

    public function destroy($id)
    {
        $offerLetter = OfferLetter::find($id);

        if ($offerLetter) {
            $offerLetter->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
