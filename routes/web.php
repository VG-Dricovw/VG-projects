<?php

use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Resources\UserResource;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'quiz' => QuizController::class,
    'users' => UserController::class
]);

Route::get('/quiz/take', [QuizController::class, 'take']);