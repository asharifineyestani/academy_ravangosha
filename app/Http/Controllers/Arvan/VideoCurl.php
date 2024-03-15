<?php

namespace App\Http\Controllers\Arvan;

use App\Http\Controllers\Controller;
use App\Models\ArvanVideo;
use App\Models\ArvanChannel;
use App\Models\Course;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Image;

class VideoCurl extends Controller
{

    public function updateChannels()
    {
        $videoPlatformEndpoint = new VideoPlatformEndpoint();
        $channels = $videoPlatformEndpoint->getChannels();


        foreach ($channels as $channel) {
            $matchRow = ['id' => $channel['id']];
            $query = ArvanChannel::where($matchRow);


            $channel = $this->adaptData($channel);


            if ($query->exists()) {
                $query->update($channel);
            } else {

                ArvanChannel::create($channel);
            }


            $this->createCourse($channel);

            #update videos
            $this->updateChannelVideos($channel['id']);


        }

    }


    public function updateChannelVideos($channelId)
    {
        $videoPlatformEndpoint = new VideoPlatformEndpoint();
        $videos = $videoPlatformEndpoint->getChannelVideos($channelId);

        $sortNumbers = ArvanVideo::where('channel_id', $channelId)->pluck('sort_number')->toArray();

        if (count($sortNumbers) > 0) {

            $order = max($sortNumbers);
        } else
            $order = 0;


        foreach ($videos as $video) {
            $video['channel_id'] = $channelId;
            $matchRow = ['id' => $video['id']];

            $query = ArvanVideo::where($matchRow);



            $video = $this->adaptData($video);






            $video['thumbnail_path'] = $this->downloadVideoImage($video);

            if ($query->exists()) {
                $query->update($video);

            } else {
                $video['sort_number'] = ++$order;
                ArvanVideo::create($video);

            }

        }


    }


    public function createCourse($channel)
    {
        $oldCourse = Course::where('channel_id', $channel['id'])->exists();

        if ($oldCourse)
            return null;


        $ali = User::where('mobile', '09128182951')->first();

        $fields = [
            'channel_id' => $channel['id'],
            'title' => $channel['title'],
            'status' => 'TODO',
            'is_private' => false,
            'author_id' => $ali->id,
            'thumbnail_path' => '/courses/' . $channel['id'] . '.jpg',
        ];

        Course::create($fields);
    }


    public function downloadVideoImage($video)
    {


        $thumbnail_url = $video['thumbnail_url'];

        if (!$thumbnail_url)
            return null;

        $path = $thumbnail_url;

        $fileName = '/videos/' . $video['id'] . '.jpg';


        Image::make($path)->resize(128, 72)->save(public_path(Controller::UPLOAD_PATH . $fileName));

        return $fileName;


    }


    public function createOrUpdateVideo($channelId, $videoId)
    {
        $result = 'FAILED';

        $oldVideoCondition = ['id' => $videoId];
        $oldVideoExists = ArvanVideo::query()->where($oldVideoCondition)->exists();


        $videoPlatformEndpoint = new VideoPlatformEndpoint();


        $videoData = $videoPlatformEndpoint->getVideo($videoId);


        if (!$videoData)
            return $result;


        $videoData['channel_id'] = $channelId;


        $videoData['thumbnail_path'] = $this->downloadVideoImage($videoData);


        $videoData['sort_number'] = $this->getSortNumber($channelId);


        $videoData = $this->adaptData($videoData);


        if ($oldVideoExists) {
            unset($videoData['title']);
            ArvanVideo::query()->where($oldVideoCondition)->update($videoData);
            $result = 'UPDATED';

        } else {
            ArvanVideo::query()->create($videoData);
            $result = 'CREATED';
        }

        return $result;

    }


    public function getSortNumber($channelId)
    {
        $lastVideo = ArvanVideo::query()
            ->where('channel_id', $channelId)
            ->orderBy('sort_number', 'Desc')
            ->first();

        return $lastVideo ? $lastVideo->sort_number + 1 : 1;

    }


    public function adaptData($data): array
    {
        $allowed = [
            'id',
            'title',
            'description',
            'file_info',
            'thumbnail_time',
            'status',
            'channel_id',
            'convert_mode',
            'thumbnail_url',
            'video_url',
            'mp4_videos',
            'profile_id',
            'parallel_convert',
            'watermark_id',
            'watermark_area',
            'convert_info',
            'options',
            'thumbnail_path',
        ];

        return array_intersect_key($data, array_flip($allowed));

    }



    public function adaptDataChannel($data): array
    {
        $allowed = [
            'id',
            'title',
            'description',
            'secure_link_enabled',
            'secure_link_key',
            'ads_enabled',
            'present_type',
            'campaign_id',
            'secure_link_with_ip',
        ];

        return array_intersect_key($data, array_flip($allowed));

    }


}
