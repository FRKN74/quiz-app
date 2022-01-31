<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

//Model

use App\Models\Question;
use App\Models\Quiz;

//Request
use App\Http\Requests\QuestionsCreateRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
        $quiz = Quiz::whereId($id)->with('questions')->first();
        return view('Admin.Question.list',compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz = Quiz::find($id);
        return view('Admin.Question.create',compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionsCreateRequest $request , $id)
    {
        if ($request->hasFile('image')) { // requestten gelen bir resim var ise 
            $fileName= Str::slug($request->question).'.'.$request->image->extension();
            $fileNameWithUpload = 'uploads/'.$fileName;
            $request->image->move(public_path('uploads'),$fileName);
            $request->merge([
                'image' =>  $fileNameWithUpload
            ]);
        }
        Quiz::find($id)->questions()->create($request->post());

        return redirect()->route('questions.index',$id)->withSuccess('Soru eklendi.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
