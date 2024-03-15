<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SolicitationController;


/*
|--------------------------------------------------------------------------
| Show Video
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/cloud/videos/{videoId}', \App\Http\Livewire\Video\Show::class)->middleware('canWatchVideo');



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::controller(MessageController::class)
    ->group(function () {
        Route::post('/messages', 'store');
    });




#stream
Route::get('stream/{id}', function ($id) {
    $stream = \App\Models\Video::where('id', $id)->first();
    $video_path = public_path($stream->path);

    $tmp = new \App\Http\Classes\VideoStream($video_path);
    $tmp->start();
})->name('stream');

#welcome
Route::get('/', function () {
    return redirect('/courses');
//    return view('welcome');
});


#Solicitation [Become an Instructor]
Route::controller(SolicitationController::class)->group(function () {
    Route::post('/solicitations', 'store');
});

#course
Route::controller(CourseController::class)->group(function () {
    Route::get('/courses', 'index');
    Route::get('/courses/{id}', 'show');
    Route::get('/courses/{courseId}/videos/{videoId}', 'video');
    Route::get('/videos/{videoId}', 'video2');
});


#post
Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::get('/posts/{id}', 'show');
});

#dynamic pages
Route::controller(PageController::class)->group(function () {
    Route::get('/pages/{slug}', 'show');
});
