<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArvanChannel extends Model
{
    use HasFactory;

    protected $fillable = [
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

    protected $casts = [
        'id' => 'string'
    ];


}
