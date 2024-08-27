<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function index()
    {
        return QuestionResource::collection(Question::all());
    }

    public function create()
    {
        return view("Questions/create.blade.php");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "",
            "email" => "",
            "password" => "",
        ]);

    }

    public function show($id)
    {
        return new QuestionResource(Question::findOrFail($id));
    }

    public function edit($id)
    {
        $Question = Question::find($id);
        return view("Questions/edit", compact("Question"));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required",
            "email" => "required",
            "password" => REQ_PASSWORD,
        ]);
    }

    public function destroy($id)
    {
        $Question = Question::find($id);
        $Question->delete();
        return redirect("Questions/index")->with("success", "deleted Question");
    }




}
