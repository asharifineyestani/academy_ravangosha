<?php

namespace App\Models;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'duration',
        'price',
        'supported_price',
        'thumbnail_path',
        'count_downloaded',
        'author_id',
        'prerequisites',
        'excerpt',
        'intro_path',
        'is_private',
        'channel_id',
        'status',

    ];


    protected $appends = ['enrolled', 'calculatedSupportedPrice'];

    public function author()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function getEnrolledAttribute()
    {

        return $this->users->contains(\Auth::id());
    }

    public function getCalculatedSupportedPriceAttribute()
    {

        $price = $this->supported_price;

        $query = Course::query()->where('id', $this->id)->first();

//        dd($query->enrolled);


        if (!$query->enrolled)
            return $price;

        if ($query->users()->where('is_supported', 1)->get()->contains(\Auth::id()))
            $price = 0;
        elseif ($query->users()->where('is_supported', 0)->get()->contains(\Auth::id()))
            $price = $this->supported_price - $price = $this->price;


        return $price;
    }


    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function videos()
    {
        return $this->hasManyThrough(Video::class, Topic::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


    public function users()
    {
        return $this->belongsToMany(User::class, 'enrolls');
    }


    public function getThumbnailPathAttribute($value): string
    {
        return Controller::UPLOAD_PATH . $value;
    }

    public function channel(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ArvanChannel::class, 'id', 'channel_id');
    }

    public function arvanVideos()
    {
        return $this->hasMany(ArvanVideo::class, 'channel_id', 'channel_id');
    }

    public function scopeIsPriced($query)
    {
        $query->whereNotNull('price');
    }

    public function tasks()
    {
        return $this->hasManyThrough(
            Task::class,
            ArvanVideo::class,
            'channel_id',
            'video_id'
        );
    }


}
