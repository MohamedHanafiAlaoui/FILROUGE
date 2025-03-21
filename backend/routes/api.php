<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



//route authentifier

Route ::post('login',[UserController::class, 'login']);
Route ::post('register',[UserController::class, 'register']);
Route ::post('logout',[UserController::class, 'logout'])->middleware('auth:sanctum');