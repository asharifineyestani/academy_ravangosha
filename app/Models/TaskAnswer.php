<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TaskAnswer extends Model  implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'task_id',
        'body',
        'status',
        'hint',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}


