<?php

use \App\Http\Controllers\Arvan\VideoPlatformEndpoint;


/*
|--------------------------------------------------------------------------
| Show data from Arvan
|--------------------------------------------------------------------------
|
*/
Route::get('/videos/{id}', [VideoPlatformEndpoint::class, 'getVideo']);
Route::get('/videos/{id}/thumbnail', [VideoPlatformEndpoint::class, 'getVideoThumbnail']);
Route::get('/channels', [VideoPlatformEndpoint::class, 'getChannels']);
Route::get('/channels/{channelId}/videos', [VideoPlatformEndpoint::class, 'getChannelVideos']);
Route::get('/channels/{id}', [VideoPlatformEndpoint::class, 'getChannel']);
