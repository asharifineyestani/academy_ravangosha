<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;


    protected $fillable = [
        'uri',
        'method',
        'status_code',
        'ip',
        'session_id',
        'user_id',
        'server',
        'input',
        'created_at',
        'updated_at',
        'path',
        'referer',
        'browser',
        'platform',
    ];


    protected $casts = [
        'uri' => 'string',
        'method' => 'string',
        'status_code' => 'integer',
        'ip' => 'string',
        'session_id' => 'string',
        'user_id' => 'integer',
        'server' => 'json',
        'input' => 'json',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'path' => 'string',
        'referer' => 'string',
        'browser' => 'string',
        'platform' => 'string',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
