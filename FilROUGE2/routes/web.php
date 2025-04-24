<?php

use App\Http\Controllers\AgricoleSolutionsAdapteesController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\SolutionsAdapteesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarEntryController;



Route::get('/inscription', [UserController::class, 'showRegisterForm'])->name('inscription');
Route::post('/inscription', [UserController::class, 'register'])->name('inscription');

Route::get('/connexion', [UserController::class, 'showLoginForm'])->name('login');


Route::post('/connexion', [UserController::class, 'login'])->name('login.submit');


Route::get('/', function () {
    return view('welcome');
});


Route::get('/agriculteur/Calendrier', [CalendrierController::class, 'index'])->name('agriculteur.Calendrier');

// Route::get('/agriculteur/etapes/{id}', [CalendarEntryController::class, 'index'])->name('agriculteur.etapes');
Route::get('/agriculteur/etapes/{id}', [CalendarEntryController::class, 'index'])->name('agriculteur.etapes');


Route::middleware('auth')->group(function()
{
    Route::get('/agriculteur/messages', [SolutionsAdapteesController::class,'index'])->name('user');
    Route::post('/agriculteur/messages', [SolutionsAdapteesController::class,'chat'])->name('chat');
    Route::post('/agriculteur/messages/sendmessage', [SolutionsAdapteesController::class,'sendMessage'])->name('sendmessage');

    Route::post('/agriculteur/messages/typing', [SolutionsAdapteesController::class,'typing']);
    Route::post('/agriculteur/messages/online', [SolutionsAdapteesController::class,'setOnline']);
    Route::post('/agriculteur/messages/offline', [SolutionsAdapteesController::class,'setOffline']);

});


Route::middleware('auth')->group(function()
{
    Route::get('/agricole/messages', [AgricoleSolutionsAdapteesController::class,'index'])->name('user');
    Route::post('/agricole/messages', [AgricoleSolutionsAdapteesController::class,'chat'])->name('chat');
    Route::post('/agricole/messages/sendmessage', [AgricoleSolutionsAdapteesController::class,'sendMessage'])->name('sendmessage');

    Route::post('/agricole/messages/typing', [AgricoleSolutionsAdapteesController::class,'typing']);
    Route::post('/agricole/messages/online', [AgricoleSolutionsAdapteesController::class,'setOnline']);
    Route::post('/agricole/messages/offline', [AgricoleSolutionsAdapteesController::class,'setOffline']);

});