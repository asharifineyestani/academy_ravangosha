<?php

Route::controller(\App\Http\Controllers\Maintenance\DbController::class)->group(function () {
    Route::get('/menu/updateNavbar', 'updateNavbar');
    Route::get('/role/assignRoleToAli', 'assignRoleToAli');
});
