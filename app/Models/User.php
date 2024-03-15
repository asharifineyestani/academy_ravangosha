<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;
use Carbon\Carbon;

class User extends Authenticatable implements Wallet
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasWallet;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'avatar_path',
        'headline',
        'bio'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrolls')->distinct('course_id');
    }


    public function watchedVideos()
    {
        return $this->belongsToMany(ArvanVideo::class, 'watch_logs');

    }

    public function scopeLastMonthDeposit()
    {
        return $this->transactions()
            ->whereMonth('created_at', '>=', Carbon::now()->subMonth()->month)
            ->where('type', 'withdraw')
            ->sum('amount');
    }


    public function getAvatarPathAttribute($value): string
    {
        if ($value)
            return '/storage/uploads' . $value;
        else
            return '/storage/defaults/user.png';
    }

}
