<?php

namespace App\Models;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArvanVideo extends Model
{

    use HasFactory;

    protected $casts = [
        'mp4_videos' => 'json',
        'file_info' => 'json',
        'convert_info' => 'json',
        'options' => 'json',
        'id' => 'string',
        'is_free' => 'boolean'
    ];


    protected $appends = [
        'watched', 'watched_percentage', 'adapted_videos', 'duration_minute','duration'
    ];


    protected $fillable = [
        'sort_number',
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

    public function tasks()
    {
        return $this->hasMany(Task::class, 'video_id');
    }

    public function getAdaptedVideosAttribute()
    {

        $adaptedVideos = [];


        foreach ($this->mp4_videos ?? [] as $mp4_video) {


            preg_match('/h_(?<size>(.*))_/', $mp4_video, $matches);
            $adaptedVideos[] = [
                'url' => $mp4_video,
                'size' => $matches['size']
            ];

        };

        return $adaptedVideos;


    }

    public function getDurationMinuteAttribute()
    {

        if (!isset($this->file_info['general']['duration']))
            return 0;
        $seconds = $this->file_info['general']['duration'];
        return floor($seconds / 3600) . gmdate(":i:s", $seconds % 3600);
    }



    public function getDurationAttribute()
    {

        if (!isset($this->file_info['general']['duration']))
            return 0;
        return $this->file_info['general']['duration'];
    }


    public function watchedByUsers()
    {
        return $this->belongsToMany(User::class, 'watch_logs', 'video_id');

    }


    public function getPathAttribute($value)
    {
//        return '/storage/uploads/' . $value;
    }


    public function getWatchedAttribute()
    {

        return $this->watchedByUsers->contains(\Auth::id());
    }

    public function getWatchedPercentageAttribute()
    {

        $log = WatchLogs::query()
            ->where(['video_id' => $this->id])
            ->where(['user_id' => \Auth::id()])
            ->first();

        if ($log)
            return $log->watched_percentage;

        return 0;
    }


    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function watchLogs()
    {
        return $this->hasMany(WatchLogs::class, 'video_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'channel_id', 'channel_id',);

    }

    public function getThumbnailPathAttribute($value): string
    {
        return Controller::UPLOAD_PATH . $value;
    }


}
