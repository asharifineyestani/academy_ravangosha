<?php

use \App\Http\Controllers\InstructorDashboardController;
use \App\Http\Controllers\Arvan\ManagementController;

Route::get('/dashboard', \App\Http\Livewire\Dashboard\Partials\DashboardItems::class)->name('instructor.home');
Route::get('/transactions', [InstructorDashboardController::class, 'transactions']);
Route::get('/wallet', [InstructorDashboardController::class, 'wallet']);
Route::get('/tasks', \App\Http\Livewire\Instructor\Tasks\Index::class);
Route::get('/profile', [InstructorDashboardController::class, 'profile']);
Route::put('/profile', [InstructorDashboardController::class, 'updateProfile']);
Route::get('/password', [InstructorDashboardController::class, 'password']);
Route::put('/change-password', [InstructorDashboardController::class, 'changePassword']);
Route::post('/deposit', [InstructorDashboardController::class, 'deposit']);



Route::get('/courses/{courseId}/edit', [ManagementController::class, 'editCourse']);
Route::put('/courses/{courseId}', [ManagementController::class, 'updateCourse']);


Route::get('/courses', \App\Http\Livewire\Instructor\Courses\Index::class);
Route::get('/courses/{courseId}/videos', \App\Http\Livewire\Instructor\Videos\Index::class);
Route::get('/videos/{videoId}/tasks/create', \App\Http\Livewire\Instructor\Tasks\Create::class);
Route::get('/tasks/{taskId}/', \App\Http\Livewire\Instructor\Tasks\Show::class);



Route::get('/posts', \App\Http\Livewire\Instructor\Posts\Index::class);
Route::get('/posts/create', \App\Http\Livewire\Instructor\Posts\Create::class);
Route::get('/posts/{postId}/edit', \App\Http\Livewire\Instructor\Posts\Create::class);

