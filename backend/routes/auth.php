<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::post(uri: '/register', action: [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::post(uri: '/login', action: [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post(uri: '/forgot-password', action: [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::post(uri: '/reset-password', action: [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');

Route::get(uri: '/verify-email/{id}/{hash}', action: VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post(uri: '/email/verification-notification', action: [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::post(uri: '/logout', action: [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
