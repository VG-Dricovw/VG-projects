<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{

    public function index()
    {
        $quiz = Question::all();
        return response()->json($quiz);

    }

    public function create()
    {
        return view("/quiz/create");
    }

    public function take() {
        return view("/quiz/take");
    }

    public function store(Request $request)
    {
        echo $request;
        die;
        $quiz = new Question();
        $quiz->chapter = $request->chapter;
        $quiz->question = $request->question;
        $quiz->answer = $request->answer;
        $quiz->save();
        return response()->json([
            "message" => "question added"
        ], 201);
    }

    public function show($id)
    {
        $question = Question::find($id);
        if (!empty($question)) {
            return response()->json($question);
        } else {
            return response()->json([
                "message" => "question not found"
            ], 404);
        }
    }

    public function edit($id)
    {
        $question = Question::find($id);
        return view("/quiz{$id}/edit", compact("question"));
    }

    public function update(Request $request, $id)
    {
        var_dump($id);
        if (Question::where('id', $id)->exists()) {
            $question = Question::find($id);
            $question->chapter = is_null($request->chapter) ? $question->chapter : $request->chapter;
            $question->question = is_null($request->question) ? $question->question : $request->question;
            $question->answer = is_null($request->answer) ? $question->answer : $request->answer;
            $question->save();
            return response()->json([
                'message' => 'question updated'
            ], 204);
        } else {
            return response()->json([
                'message' => 'question not found'
            ], 404);
        }
    }

    public function destroy($id)
    {
        if (Question::where('id', $id)->exists()) {
            $question = Question::find($id);
            $question->delete();

            return response()->json([
                "message" => "deleted question"
            ], 202);
        } else {
            return response()->json([
                "message" => "question no found"
            ], 404);

        }

    }
}