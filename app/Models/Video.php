<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'title',
        'topic_id',
        'duration',
        'is_free',
    ];



//    protected $appends = [
//        'enrolled', 'watched', 'watched_percentage'
//    ];
//
    protected $appends = [
        'watched', 'watched_percentage'
    ];


    protected $casts = [
        'is_free' => 'boolean'
    ];


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


//    public function course()
//    {
//        return Course::query();
//    }

//    public function getEnrolledAttribute()
//    {
//        return $this->course->enrolled;
//        return Course::limit(1)->get();
//    }


    public function watchedByUsers()
    {
        return $this->belongsToMany(User::class, 'watch_logs');

    }


    public function getPathAttribute($value)
    {
        return '/storage/uploads/' . $value;
    }


    public function scoperPermissionToWatch()
    {
        return false;
    }



}
