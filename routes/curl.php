<?php


use \App\Http\Controllers\Arvan\VideoCurl;


/*
|--------------------------------------------------------------------------
| update channels & videos from ArvanCloud
|--------------------------------------------------------------------------
|
*/


Route::get('channels', [VideoCurl::class, 'updateChannels']);
Route::get('/channels/{channelId}/videos/{videoId}', [VideoCurl::class, 'createOrUpdateVideo']);

