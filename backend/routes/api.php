<?php

use App\Http\Controllers\CalendarEntryController;
use App\Http\Controllers\CalendrierController;
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


Route ::post('Calendrier',[CalendrierController::class, 'store']);
Route ::get('Calendrier/',[CalendrierController::class, 'index']);



Route ::get('Calendrier/{id}',[CalendrierController::class, 'show']);
Route ::get('CalendarEntry/{id}',[CalendarEntryController::class, 'index']);
