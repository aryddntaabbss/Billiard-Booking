<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BookingController;

use Illuminate\Support\Facades\Route;

Route::get('/auth/redirect', [AuthController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/pay/{booking}', [PaymentController::class, 'pay'])->name('payment.pay');
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [BookingController::class, 'index'])->name('landing');
Route::get('/booking/{meja}', [BookingController::class, 'formBooking'])->name('booking.form');
Route::post('/booking/{meja}', [BookingController::class, 'storeBooking'])->name('booking.store');
