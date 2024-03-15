<?php

Route::get('dashboard', function (){
    return redirect('/admin/users');
});

Route::crud('categories', \App\Http\Controllers\Crud\CategoryController::class);
Route::crud('comments', \App\Http\Controllers\Crud\CommentController::class);
Route::crud('courses', \App\Http\Controllers\Crud\CourseController::class);
//Route::crud('enrolls', \App\Http\Controllers\Crud\CourseController::class);
Route::crud('faqs', \App\Http\Controllers\Crud\FaqController::class);
Route::crud('feedback', \App\Http\Controllers\Crud\FeedbackController::class);
Route::crud('instructors', \App\Http\Controllers\Crud\InstructorController::class);
Route::crud('menu', \App\Http\Controllers\Crud\MenuController::class);
Route::crud('messages', \App\Http\Controllers\Crud\MessageController::class);
Route::crud('pages', \App\Http\Controllers\Crud\PageController::class);
Route::crud('posts', \App\Http\Controllers\Crud\PostController::class);
Route::crud('solicitations', \App\Http\Controllers\Crud\SolicitationController::class);
Route::crud('tags', \App\Http\Controllers\Crud\TagController::class);
Route::crud('topics', \App\Http\Controllers\Crud\TopicController::class);
Route::crud('users', \App\Http\Controllers\Crud\UserController::class);
Route::crud('videos', \App\Http\Controllers\Crud\VideoController::class);
Route::crud('languages', \App\Http\Controllers\Crud\LanguageController::class);


Route::crud('transactions', \App\Http\Controllers\Crud\TransactionController::class);
Route::crud('wallets', \App\Http\Controllers\Crud\WalletController::class);
Route::get('balance/{id}', [\App\Http\Controllers\Crud\BalanceController::class, 'edit']);
Route::put('balance/{id}', [\App\Http\Controllers\Crud\BalanceController::class,'update']);

