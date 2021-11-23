<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function show($id)
    {
        $data['exam'] = Exam::findOrFail($id);
        return view('web.exams.show')->with($data);
    }

    public function start($examId)
    {
        $user = Auth::user();
        $user->exams()->attach($examId);

        return redirect(url("exams/questions/$examId"));
    }

    public function questions($id)
    {
        $data['exam'] = Exam::findOrFail($id);
        return view('web.exams.questions')->with($data);
    }

    public function submit($examId, Request $request)
    {
        $request->validate([

            'answers' => 'required|array',
            'answers.*' => 'required|in:1,2,3,4',

        ]);

        // Calculate Score
        $exam = Exam::findOrFail($examId);
        
        $points = 0;
        $totalQuesNum = $exam->questions->count();

        foreach ($exam->questions as $question) {
            if(isset($request->answers[$question->id]))
            {
                $userAns = $request->answers[$question->id];
                $rightAns = $question->right_ans;

                if($userAns == $rightAns) 
                    $points += 1 ;
            }

        }
        $score = ($points / $totalQuesNum) * 100;
        // Calculate Time Mins
        $user = Auth::user();
        $pivotRow = $user->exams()->where('exam_id', $examId)->first();
        $startTime = $pivotRow->pivot->created_at;
        $submitTime = Carbon::now();

        $timeMins = $submitTime->diffInMinutes($startTime);
        // dd($timeMins);

        // Update pivot row 
        $user->exams()->updateExistingPivot($examId, [
            'score' => $score,
            'time_mins' => $timeMins,
        ]);

        return redirect(url("exams/show/$examId"));

    }

}
