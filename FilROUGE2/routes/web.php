<?php

use App\Http\Controllers\AgricoleSolutionsAdapteesController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\FichesExplicativesController;
use App\Http\Controllers\SignalerController;
use App\Http\Controllers\SolutionsAdapteesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StadescultureController;



Route::get('/inscription', [UserController::class, 'showRegisterForm'])->name('inscription');
Route::post('/inscription', [UserController::class, 'register'])->name('inscription');
Route::get('/connexion', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/connexion', [UserController::class, 'login'])->name('login.submit');


Route::get('/', function () {
    return view('welcome');
});




Route::middleware(['auth'])->group(function () {
    // Calendar routes
    Route::get('agriculteur/Calendrier', [CultureController::class, 'index'])->name('agriculteur.Calendrier');
    Route::post('agriculteur/Calendrier', [CultureController::class, 'store'])->name('calendrier.store');
    Route::get('agriculteur/Calendrier/{id}', [CultureController::class, 'show'])->name('calendrier.show');
    Route::put('agriculteur/Calendrier/update/{id}', [CultureController::class, 'update'])->name('calendrier.update');
    Route::delete('agriculteur/calendrier/delete/{id}', [CultureController::class, 'destroy'])->name('calendrier.destroy');


    //

    Route::get('/agriculteur/entries/{id}', [StadescultureController::class, 'index'])->name('calendar.entries');
    Route::post('/agriculteur/entries', [StadescultureController::class, 'store'])->name('calendar.entries.store');
    Route::put('/agriculteur/entries/update/{id}', [StadescultureController::class, 'update'])->name('calendar.entries.update');



    //




    Route::post('agriculteur/signalers', [SignalerController::class, 'store'])->name('signalers.store');
    // Route::get('agriculteur/Calendrier/{id}', [SignalerController::class, 'show'])->name('calendrier.show');
    Route::get('agriculteur/signalers', [SignalerController::class, 'index'])->name('signalers.index');
    Route::get('agriculteur/detailsSignalers/{id}', [SignalerController::class, 'show'])->name('signaler.show');


    //


    Route::get('agriculteur/FichesExplicatives', [FichesExplicativesController::class, 'index'])->name('agriculteur.FichesExplicatives');
    Route::get('agriculteur/Technique/{id}', [FichesExplicativesController::class, 'show'])
        ->name('Technique.show');

});



Route::get('admin/create', function () {
    return view('admin/create');
})->name('admin.create');
Route::post('admin/create', [FichesExplicativesController::class, 'store'])->name('fiches.store');

Route::get('/admin/edit/{id}', [FichesExplicativesController::class, 'edit'])->name('admin.Update');

Route::put('/admin/update/{id}', [FichesExplicativesController::class, 'update'])->name('fiches.update');
Route::get('admin/FichesExplicatives', [FichesExplicativesController::class, 'Adminindex'])->name('admin.FichesExplicatives');

use App\Http\Controllers\StatisticsController;

Route::get('admin/', [StatisticsController::class, 'statistics'])->name('admin.index');








Route::middleware('auth')->group(function () {
    Route::get('/agriculteur/messages', [SolutionsAdapteesController::class, 'index'])->name('user');
    Route::post('/agriculteur/messages', [SolutionsAdapteesController::class, 'chat'])->name('chat');
    Route::post('/agriculteur/messages/sendmessage', [SolutionsAdapteesController::class, 'sendMessage'])->name('sendmessage');

    Route::post('/agriculteur/messages/typing', [SolutionsAdapteesController::class, 'typing']);
    Route::post('/agriculteur/messages/online', [SolutionsAdapteesController::class, 'setOnline']);
    Route::post('/agriculteur/messages/offline', [SolutionsAdapteesController::class, 'setOffline']);

});


Route::middleware('auth')->group(function () {
    Route::get('/agricole', [AgricoleSolutionsAdapteesController::class, 'index'])->name('useragricole');
    Route::post('/agricole', [AgricoleSolutionsAdapteesController::class, 'chat'])->name('chatagricole');
    Route::post('/agricole/sendmessage', [AgricoleSolutionsAdapteesController::class, 'sendMessage'])->name('sendmessage');

    Route::post('/agricole/typing', [AgricoleSolutionsAdapteesController::class, 'typing']);
    Route::post('/agricole/online', [AgricoleSolutionsAdapteesController::class, 'setOnline']);
    Route::post('/agricole/offline', [AgricoleSolutionsAdapteesController::class, 'setOffline']);

});



Route::resource('signalers', SignalerController::class);
