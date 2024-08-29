<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function create()
    {
        return view("users/create.blade.php");
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
        return new UserResource(User::findOrFail($id));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view("users/edit", compact("user"));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            "name"=> "required",
            "email"=> "required",
            "password"=> REQ_PASSWORD,
            ]);
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect("users/index")->with("success","deleted user");
    }




}
