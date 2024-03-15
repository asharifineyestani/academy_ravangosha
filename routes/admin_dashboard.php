<?php


use \App\Http\Controllers\Admin\UserController;


Route::get('/students', [\App\Http\Controllers\Admin\UserController::class, 'students'])->name('instructor.home');
Route::get('/instructors', [\App\Http\Controllers\Admin\UserController::class, 'instructors'])->name('instructor.home');
Route::get('/login-as/{userId}', [\App\Http\Controllers\Admin\UserController::class, 'loginAs'])->name('instructor.home');




