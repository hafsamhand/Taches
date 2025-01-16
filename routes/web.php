<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TacheController;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('taches',TacheController::class);
Route::post('taches/{id}/complete', [TacheController::class, 'complete'])->name('taches.complete');
