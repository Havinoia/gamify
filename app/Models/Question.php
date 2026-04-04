<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'content',
        'points',
        'is_active',
    ];

    public function choices()
    {
        return $this->hasMany(QuestionChoice::class);
    }

    public function responses()
    {
        return $this->hasMany(UserResponse::class);
    }
}
