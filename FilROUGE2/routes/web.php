<?php

use App\Http\Controllers\CalendrierController;
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
