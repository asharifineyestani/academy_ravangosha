<?php

use App\Http\Controllers\Student\DashboardController;
Route::get('/dashboard', \App\Http\Livewire\Dashboard\Partials\DashboardItems::class)->name('student.home');
Route::get('/tasks/{taskId}', \App\Http\Livewire\Student\Tasks\Answer::class);

Route::get('/transactions', [DashboardController::class, 'transactions']);
Route::get('/wallet', [DashboardController::class, 'wallet']);
Route::get('/courses', [DashboardController::class, 'courses']);
Route::get('/profile', [DashboardController::class, 'profile']);
Route::put('/profile', [DashboardController::class, 'updateProfile']);
Route::get('/password', [DashboardController::class, 'password']);
Route::put('/change-password', [DashboardController::class, 'changePassword']);
Route::post('/deposit', [DashboardController::class, 'deposit']);

Route::get('/tasks', \App\Http\Livewire\Student\Tasks\Index::class);
Route::get('/tasks/{taskId}/', \App\Http\Livewire\Student\Tasks\Show::class);
