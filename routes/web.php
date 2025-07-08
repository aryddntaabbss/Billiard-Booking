<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/auth/redirect', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');


Route::get('/', function () {
    return view('welcome');
});
