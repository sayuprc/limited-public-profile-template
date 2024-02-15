<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\QR\EditController;
use App\Http\Controllers\QR\GenerateController;
use App\Http\Controllers\QR\IndexController;
use App\Http\Controllers\QR\RenderingController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (): void {
    Route::post('login', [LoginController::class, 'handle'])->name('login');
    Route::get('login', [LoginController::class, 'showForm'])->name('login.form');
});

Route::middleware('auth')->group(function (): void {
    Route::get('logout', [LogoutController::class, 'handle'])->name('logout');

    Route::prefix('qr')->group(function (): void {
        Route::get('index', [IndexController::class, 'handle'])->name('qr.index');

        Route::post('generate', [GenerateController::class, 'handle'])->name('qr.generate');
        Route::get('generate', [GenerateController::class, 'showForm'])->name('qr.generate.form');

        Route::get('show/{qr_code_id}', [RenderingController::class, 'handle'])->name('qr.show')->whereUuid('qr_code_id');

        Route::get('edit/{qr_code_id}', [EditController::class, 'showForm'])->name('qr.edit.form')->whereUuid('qr_code_id');
    });
});

Route::middleware('verify.token')->group(function (): void {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
});
