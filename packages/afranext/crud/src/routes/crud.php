<?php



Route::group(
    [
        'namespace' => 'Afranext\Crud\app\Http\Controllers',
        'middleware' => config('crud.base.middleware'),
        'prefix'     => config('crud.base.prefix'),
    ],
    function () {
        Route::get('/', function(){
            echo 'Hello from the afranext package!';
        });

        Route::get('login', [Afranext\Crud\app\Controllers\AuthController::class,'login'])->name('crud.login');
    });



Route::get('uploads/{file}', function ($file) {
    return Storage::disk('public')->response('/uploads/'.$file);
});


Route::post('crud/storeMedia', 'Afranext\Crud\app\Controllers\CrudController@storeMedia')->name('crud.storeMedia');
Route::get('crud/deleteMedia/{fileName}', 'Afranext\Crud\app\Controllers\CrudController@deleteMedia')->name('crud.deleteMedia');

