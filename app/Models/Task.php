<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;


class Task extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    protected $fillable = [
        'video_id',
        'task_group_id',
        'body',
    ];

    public function video()
    {
        return $this->belongsTo(ArvanVideo::class);
    }

    public function answers()
    {
        return $this->hasMany(TaskAnswer::class);
    }

    static public function getUsersWithAnswer($taskId)
    {
        return self::query()
            ->where('task_id', $taskId)
            ->join('task_answers', 'task_answers.task_id', '=', 'tasks.id')
            ->join('users', 'users.id', '=', 'task_answers.user_id')
            ->select('task_answers.*', 'users.name', 'users.avatar_path')
            ->get();
    }

    public function scopeIsMine($query)
    {
        return $query
            ->select('tasks.*','AV.sort_number')
            ->leftJoin('arvan_videos as AV', 'AV.id', '=', 'tasks.video_id')
            ->leftJoin('courses as C', 'AV.channel_id', '=', 'C.channel_id')
            ->leftJoin('enrolls as E', 'E.course_id', '=', 'C.id')
            ->join('watch_logs as W', 'W.video_id', '=', 'AV.id' )
            ->where('W.user_id' , Auth::id())
            ->distinct('tasks.id')
            ->where('E.user_id' , Auth::id())
            ;
    }
}
