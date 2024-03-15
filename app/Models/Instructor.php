<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends User
{
    protected $table = 'users';
    use HasFactory;

    protected $fillable = [
        'name', 'avatar_path', 'headline', 'description'
    ];
}
