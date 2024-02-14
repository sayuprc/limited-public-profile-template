<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (): void {
    Route::post('login', [LoginController::class, 'handle'])->name('login');
    Route::get('login', [LoginController::class, 'showForm'])->name('login.form');
});

Route::middleware('auth')->group(function (): void {
    Route::get('logout', [LogoutController::class, 'handle'])->name('logout');

    Route::get('dashboard', function (): void {
        // TODO
    })->name('dashboard');
});
