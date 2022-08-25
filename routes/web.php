<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [EventController::class, 'index']);
Route:: get('/', [EventController::class, 'index'])->name('home');
Route:: delete('/delete/{id}', [EventController::class, 'destroy'])->name ('delete');
//CREATE:
Route::get('/create', [EventController::class, 'create'])->name('createEvent');

Route::post('/store', [EventController::class, 'store'])->name('storeEvent'); 






