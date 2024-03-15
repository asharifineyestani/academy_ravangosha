<?php


Route::get('/clear-all', function () {
    $exitCode[] = Artisan::call('view:clear');
    $exitCode[] = Artisan::call('cache:clear');
    $exitCode[] = Artisan::call('config:cache');
    $exitCode[] = Artisan::call('route:clear');
    echo '<h1>All Sections cleared</h1>';
    echo '<br>';
    print_r($exitCode);
    die;
});

//Route::get('/seed', function () {
//    $exitCode = Artisan::call('db:seed');
//    echo '<h1>seed is successful</h1>';
//    echo '<br>';
//    echo 'exitCode: ' . $exitCode;
//    die;
//});


Route::get('/migrate', function () {
    $exitCode = Artisan::call('migrate');
    echo '<h1>migrate is successful</h1>';
    echo '<br>';
    echo 'exitCode: ' . $exitCode;
    die;
});
//
//
//Route::get('/storage/link', function () {
//    $exitCode = Artisan::call('storage:link');
//    echo '<h1>migrate is successful</h1>';
//    echo '<br>';
//    echo 'exitCode: ' . $exitCode;
//    die;
//});
//
//
//
//Route::get('/migrate-fresh-seed', function () {
//    $exitCode = Artisan::call('migrate:fresh --seed');
//    echo '<h1>fresh is successful</h1>';
//    echo '<br>';
//    echo 'exitCode: ' . $exitCode;
//    die;
//});
