<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Curl [cronJobs]
|--------------------------------------------------------------------------
|
*/
Route::group([
    'prefix' => 'curl',
    'middleware' => ['web']
], function ($router) {
    require base_path('routes/curl.php');
});


/*
|--------------------------------------------------------------------------
| CRUD [package]
|--------------------------------------------------------------------------
|
*/
Route::group([
    'prefix' => 'developer',
    'middleware' => ['web']
], function ($router) {
    require base_path('routes/crud.php');
});


/*
|--------------------------------------------------------------------------
| public
|--------------------------------------------------------------------------
|
*/

Route::group([
    'middleware' => ['web']
], function ($router) {
    require base_path('routes/public.php');
});


/*
|--------------------------------------------------------------------------
| dashboard
|--------------------------------------------------------------------------
|
*/

#admin routes
Route::group([
    'prefix' => 'admin',
    'name' => 'admin.',
    'middleware' => ['web', 'auth', 'role:admin']
], function ($router) {
    require base_path('routes/dashboard/admin.php');
});


Route::get('admin/re-login', function () {
    return redirect('/admin/students');
})->middleware(['auth', 're_login'])->name('admin.reLogin');


#student routes
Route::group([
    'prefix' => 'student',
    'middleware' => ['web', 'auth']
], function ($router) {
    require base_path('routes/dashboard/student.php');
});


#instructor routes
Route::group([
    'prefix' => 'instructor',
    'middleware' => ['web', 'auth', 'role:instructor']
], function ($router) {
    require base_path('routes/dashboard/instructor.php');
});


/*
|--------------------------------------------------------------------------
| dev
|--------------------------------------------------------------------------
|
*/


#Maintenance
Route::group([
    'prefix' => 'maintenance',
    'middleware' => ['web']
], function ($router) {
    require base_path('routes/dev/maintenance.php');
});


#Arvan
Route::group([
    'prefix' => 'dev/arvan',
    'middleware' => ['web']
], function ($router) {
    require base_path('routes/dev/arvan.php');
});


#Artisan
Route::group([
    'prefix' => 'dev/artisan',
    'middleware' => ['web']
], function ($router) {
    require base_path('routes/dev/artisan.php');
});


#DevController
Route::group([
    'prefix' => 'dev',
    'middleware' => ['web'],
], function ($router) {
    require base_path('routes/dev/other.php');
});


/*
|--------------------------------------------------------------------------
| payments
|--------------------------------------------------------------------------
|
*/
Route::get('/payment', [\App\Http\Controllers\PaymentController::class, 'handlePay']);
Route::get('/payment/callback', [\App\Http\Controllers\PaymentController::class, 'callback']);


/*
|--------------------------------------------------------------------------
| enroll
|--------------------------------------------------------------------------
|
*/

Route::controller(CourseController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('/courses/{id}/enroll', 'enroll');
        Route::get('/courses/{id}/enroll/support', 'enrollWithSupport');
        Route::get('/courses/{id}/enroll/difference', 'enrollDifference');
    });


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('login', \App\Http\Livewire\Auth\Wizard::class)->name('login');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
