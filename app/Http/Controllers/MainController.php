<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;

class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where('status','publish')->where(function ($query)
        {
            $query->whereNull('finished_at')->orWhere('finished_at','>',now());
        })->withCount('questions')->paginate(5);
        $results = auth()->user()->result;
        return view('dashboard',compact('quizzes','results'));
    }
    public function quiz($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('questions.my_answer')->first()  ?? abort(404,'QUİZ BULUNAMADI');
        if ($quiz->my_result) {
            return view('quiz_result',compact('quiz'));
        }
        return view('quiz',compact('quiz'));
    }
    public function quiz_detail($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('my_result','topTen.user')->withCount('questions','results')->first() ?? abort(404,'QUİZ BULUNAMADI');
        return view('quiz_detail',compact('quiz'));
    }
    public function result(Request $request,$slug)
    {
        $quiz = Quiz::with('questions')->whereSlug($slug)->first() ?? abort(404,'QUİZ BULUNAMADI');
        $correct = 0;

        if ($quiz->my_result) {
            abort(404,"BU QUİZE DAHA ÖNCE KATILIM SAĞLADINIZ.");
        }
        foreach($quiz->questions as $question) {
            //echo $question->id.' - '.$question->correct_answer.' / '.$request->post($question->id).'<br>';

            Answer::create([
                'user_id' => auth()->user()->id,
                'question_id' => $question->id,
                'answer' => $request->post($question->id)
            ]);
            if ($question->correct_answer === $request->post($question->id)){
                $correct +=1;
            }
        }
        $point = round( 100/count($quiz->questions) ) * $correct;
        $wrong = (count($quiz->questions) - $correct);

        Result::create([
            'user_id' =>auth()->user()->id,
            'quiz_id' =>$quiz->id,
            'correct' =>$correct,
            'wrong' =>$wrong,
            'point' =>$point,
        ]);
        return redirect()->route('quiz_detail',$quiz->slug)->withSuccess("Quiz bitirdin tebrikler!! Puanın: ".$point);
        
    }
}
