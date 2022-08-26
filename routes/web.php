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

//UPDATE:
Route:: get ('/edit/{id}', [EventController::class, 'edit'])->name('editEvent');
Route:: patch('/event/{id}', [EventController::class, 'update'])->name('updateEvent');

//SHOW:
Route:: get ('/show/{id}', [EventController::class, 'show'])->name('showEvent');





