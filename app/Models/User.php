<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

#[Fillable(['name', 'email', 'password', 'level_id', 'total_points', 'last_point_earned_at'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements HasMedia
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, InteractsWithMedia;

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'user_badges')->withTimestamps();
    }

    public function responses()
    {
        return $this->hasMany(UserResponse::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'last_point_earned_at' => 'datetime',
        ];
    }

    public function getTierAttribute()
    {
        $level = $this->level_id ?? 1;
        
        if ($level <= 10) return 'Bronze';
        if ($level <= 20) return 'Silver';
        if ($level <= 30) return 'Gold';
        if ($level <= 40) return 'Platinum';
        if ($level <= 50) return 'Diamond';
        if ($level <= 60) return 'Master';
        if ($level <= 70) return 'Grandmaster';
        if ($level <= 80) return 'Legend';
        if ($level <= 90) return 'Mythic';
        return 'Immortal';
    }

    public function getTierColorAttribute()
    {
        $tier = $this->tier;
        
        return match($tier) {
            'Bronze' => 'text-orange-600',
            'Silver' => 'text-slate-400',
            'Gold' => 'text-yellow-400',
            'Platinum' => 'text-cyan-400',
            'Diamond' => 'text-blue-400',
            'Master' => 'text-purple-400',
            'Grandmaster' => 'text-indigo-400',
            'Legend' => 'text-rose-400',
            'Mythic' => 'text-violet-500',
            default => 'text-red-500',
        };
    }
}
