<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    use HasFactory;


    protected $fillable = [
        'user_id',
        'commentable_id',
        'commentable_type',
        'body',
        'star',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function commentable()
    {
        return $this->morphTo();
    }


    public function scopePercent($query, $star)
    {
        $commentsCount = $query->count();
        $staredCount = $query->where('star', $star)->count();

        if ($commentsCount < 1)
            return 0;

        
        return $staredCount / $commentsCount * 100;


    }


}
