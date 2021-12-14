<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExamResource;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public function show($id)
    {
        return new ExamResource(Exam::findOrFail($id));
    }

    public function showQuestions($id) 
    {
        return new ExamResource(Exam::with('questions')->findOrFail($id));

    }

    public function start($examId, Request $request)
    {
        $request->user()->exams()->attach($examId);

        return response()->json([
            'message' => 'you started exam'
        ]);
    }

    public function submit($examId, Request $request)
    {
        $exam = Exam::findOrFail($examId);
       
        $validator = Validator::make($request->all(),[
            'answers' => 'required|array',
            'answers.*' => 'required|in:1,2,3,4',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        // Calculate Score
        $points = 0;
        $totalQuesNum = $exam->questions->count();

        foreach ($exam->questions as $question) {
            if (isset($request->answers[$question->id])) {
                $userAns = $request->answers[$question->id];
                $rightAns = $question->right_ans;

                if ($userAns == $rightAns)
                    $points += 1;
            }
        }
        $score = ($points / $totalQuesNum) * 100;

        return response()->json($score);
        // Calculate Time Mins
        $user = $request->user();
        $pivotRow = $user->exams()->where('exam_id', $examId)->first();
        $startTime = $pivotRow->pivot->created_at;
        $submitTime = Carbon::now();

        $timeMins = $submitTime->diffInMinutes($startTime);

        if ($timeMins > $pivotRow->duration_mins) {
            $score = 0;
        }
        

        // Update pivot row 
        $user->exams()->updateExistingPivot($examId, [
            'score' => $score,
            'time_mins' => $timeMins,
        ]);

        return response()->json([
            'message' => "you submitted exam successfully, your score is $score "
        ]);
        
    }


    
}
