<?php


use \App\Http\Controllers\Admin\UserController;


Route::get('/dashboard', \App\Http\Livewire\Admin\Users\Students::class);


Route::get('/statistics', \App\Http\Livewire\Admin\Statistics\Index::class);
Route::get('/users/{userId}/statistics', \App\Http\Livewire\Admin\Statistics\Index::class);
Route::get('sms-logs', \App\Http\Livewire\Admin\Sms\Index::class);
Route::get('sms-logs/{mobile}', \App\Http\Livewire\Admin\Sms\Index::class);


Route::get('/instructors', \App\Http\Livewire\Admin\Users\Instructors::class);
Route::get('/students', \App\Http\Livewire\Admin\Users\Students::class);
Route::get('/users/{userId}/wallet', \App\Http\Livewire\Admin\Users\Wallet::class);
Route::get('/login-as/{userId}', [\App\Http\Controllers\Admin\UserController::class, 'loginAs']);
Route::get('/users/{userId}/login', [\App\Http\Controllers\Admin\UserController::class, 'loginAs']);



Route::get('/templates', \App\Http\Livewire\Admin\SmsTemplate\Index::class);
Route::get('/templates/create', \App\Http\Livewire\Admin\SmsTemplate\Create::class);
Route::get('/templates/{itemId}/edit', \App\Http\Livewire\Admin\SmsTemplate\Create::class);





