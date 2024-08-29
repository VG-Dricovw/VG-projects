<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizAPIController;
use App\Http\Controllers\UserController;

Route::resources([
    'quiz' => QuizAPIController::class,
    'users' => UserController::class
]);
// ->middleware('auth:sanctum');