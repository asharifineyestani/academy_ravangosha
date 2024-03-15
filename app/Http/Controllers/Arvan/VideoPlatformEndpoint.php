<?php

namespace App\Http\Controllers\Arvan;

use App\Http\Controllers\Arvan\Traits\CurlTrait;
use App\Http\Controllers\Controller;
use App\Traits\EndpointTrait;

class VideoPlatformEndpoint extends Controller
{

    use CurlTrait;


    public function getVideo($videoId)
    {
        $endpoint = 'videos/' . $videoId;
        return $this->setEndpoint($endpoint)->getRequestData();
    }


    public function getChannel($channelId)
    {
        $endpoint = 'channels/' . $channelId;
        return $this->setEndpoint($endpoint)->getRequestData();
    }


    public function getChannels()
    {
        $endpoint = 'channels';
        return $this->setEndpoint($endpoint)->getRequestData();
    }

    public function getChannelVideos($channelId)
    {
        $endpoint = '/channels/' . $channelId . '/videos';
        return $this->setEndpoint($endpoint)->getRequestData();
    }

    public function getVideoThumbnail($videoId)
    {
        $endpoint = '/videos/' . $videoId . '/thumbnail';
        return $this->setEndpoint($endpoint)->getRequestData();
    }


}
