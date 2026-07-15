<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware('guest')->group(function () {
    Volt::route('/register', 'pages.auth.register')
        ->name('register');

    Volt::route('/login', 'pages.auth.login')
        ->name('login');

    Volt::route('/forgot-password', 'pages.auth.forgot-password')
        ->name('password.request');

    Volt::route('/reset-password/{token}', 'pages.auth.reset-password')
        ->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('/confirm-password', 'pages.auth.confirm-password')
        ->name('password.confirm');
});

Volt::route('/email/verify/{id}/{hash}', 'pages.auth.verify-email')
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Volt::route('/email/verify', 'pages.auth.verify-email')
    ->middleware(['auth'])
    ->name('verification.notice');

Volt::route('/email/verification-notification', 'pages.auth.verify-email')
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');
