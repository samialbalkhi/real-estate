<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function scopeUserExist($query, $rated_user_id)
    {
        return $query->where('user_id', $rated_user_id);
    }
}
