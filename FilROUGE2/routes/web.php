<?php

use App\Http\Controllers\AgricoleSolutionsAdapteesController;
use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\SignalerController;
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




Route::middleware(['auth'])->group(function () {
    // Calendar routes
    Route::get('agriculteur/Calendrier', [CalendrierController::class, 'index'])->name('agriculteur.Calendrier');
    Route::post('agriculteur/Calendrier', [CalendrierController::class, 'store'])->name('calendrier.store');
    Route::get('agriculteur/Calendrier/{id}', [CalendrierController::class, 'show'])->name('calendrier.show');
    Route::put('agriculteur/Calendrier/update/{id}', [CalendrierController::class, 'update'])->name('calendrier.update');
    Route::delete('agriculteur/calendrier/delete/{id}', [CalendrierController::class, 'destroy'])->name('calendrier.destroy');


    Route::get('/agriculteur/entries/{id}', [CalendarEntryController::class, 'index'])->name('calendar.entries');
    Route::post('/agriculteur/entries', [CalendarEntryController::class, 'store'])->name('calendar.entries.store');
    Route::put('/agriculteur/entries/update/{id}', [CalendarEntryController::class, 'update'])->name('calendar.entries.update');



});






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
    Route::get('/agricole', [AgricoleSolutionsAdapteesController::class,'index'])->name('useragricole');
    Route::post('/agricole', [AgricoleSolutionsAdapteesController::class,'chat'])->name('chatagricole');
    Route::post('/agricole/sendmessage', [AgricoleSolutionsAdapteesController::class,'sendMessage'])->name('sendmessage');

    Route::post('/agricole/typing', [AgricoleSolutionsAdapteesController::class,'typing']);
    Route::post('/agricole/online', [AgricoleSolutionsAdapteesController::class,'setOnline']);
    Route::post('/agricole/offline', [AgricoleSolutionsAdapteesController::class,'setOffline']);

});



Route::resource('signalers', SignalerController::class);
