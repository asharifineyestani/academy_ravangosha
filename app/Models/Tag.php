<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['title'];


    public function courses()
    {
        return $this->morphedByMany(Course::class, 'taggable');
    }



}
