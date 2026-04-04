<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'name',
        'min_points',
        'description',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
