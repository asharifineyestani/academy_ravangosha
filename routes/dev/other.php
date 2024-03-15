<?php


Route::controller(\App\Http\Controllers\DevController::class)->group(function () {
    Route::get('/setVideoDuration', 'setVideoDuration');
    Route::get('/openedTasks', 'openedTasks');
    Route::get('/sendSmsClass', 'sendSmsClass');
});
