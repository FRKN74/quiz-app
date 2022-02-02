<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;

use Carbon\Carbon;
use Illuminate\Support\Str;

use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::withCount('questions');

        if(request()->get('title')){
            $quizzes = $quizzes->where('title','LIKE',"%".request()->get('title')."%");
        }
        if(request()->get('status')){
            $quizzes = $quizzes->where('status',request()->get('status'));
        }
        $quizzes = $quizzes->paginate(5);
        return view('Admin.Quiz.list',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizCreateRequest $request)
    {
        Quiz::create($request->post());
        return redirect()->route('quizzes.index')->with('success','Quiz oluşturuldu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::withCount('questions')->find($id) ?? abort(404,'Quiz Bulunamadı');
        return view('Admin.Quiz.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizUpdateRequest $request, $id)
    {
        $quiz = Quiz::find($id) ?? abort(404,'QUİZ BULUNAMADI');
        $quiz->title = $request->title;
        $quiz->description = $request->description;
        $quiz->finished_at = $request->finished_at;
        $quiz->slug = Str::slug($request->title);
        $quiz->status = $request->status;

        $quiz->update();
        return redirect()->route('quizzes.index')->withSuccess('Quiz güncellendi.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Quiz::find($id)->delete() ?? abort(404,'QUİZ BULUNAMADI');
        return redirect()->route('quizzes.index')->withSuccess('Quiz Silindi.');
    }
}
