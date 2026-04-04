<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/badges', [DashboardController::class, 'badges'])->name('badges');
Route::get('/quizzes', [DashboardController::class, 'quizzes'])->name('quizzes');
Route::get('/leaderboard', [DashboardController::class, 'leaderboard'])->name('leaderboard');
