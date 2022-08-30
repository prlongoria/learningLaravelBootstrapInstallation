<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;


Route::get('/', [EventController::class, 'index'])->name('eventsApi');
Route::delete('/deleteEvent/{id}', [EventController::class, 'destroy'])->name('destroyEventApi');
