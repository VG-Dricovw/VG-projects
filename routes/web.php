<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Resources\UserResource;
use App\Models\User;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);

Route::get('/user/{id}', function (string $id) {
    return new UserResource(User::findOrFail($id));
});