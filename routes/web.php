<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Member\CartController;
use \App\Http\Controllers\Public\VideoController;


#student routes
Route::group([
    'prefix' => 'user',
    'middleware' => ['web', 'auth']
], function ($router) {
    require base_path('routes/dashboard/user.php');
});


Route::get('/youtube/videos', [VideoController::class, 'index'])->name('youtube.index');
Route::get('/youtube/videos/{id}', [VideoController::class, 'show'])->name('youtube.show');


/*
|--------------------------------------------------------------------------
| Cart
|--------------------------------------------------------------------------
|
|
*/
Route::get('/checkout/cart', [CartController::class, 'index'])->name('member.carts.index');
Route::get('/cart/add', [CartController::class, 'addToCart'])->name('member.carts.add');
Route::get('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increaseQuantity');
Route::get('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decreaseQuantity');
Route::get('/cart/update/{id}', [CartController::class, 'updateCart'])->name('member.carts.update');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('member.carts.remove');




Route::resource('books', \App\Http\Controllers\BookController::class);

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

