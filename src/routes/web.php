<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('login', [LoginController::class, 'handle'])->name('login');
Route::get('login', [LoginController::class, 'showForm'])->name('login.form');
