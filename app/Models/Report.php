<?php

namespace App\Models;

use Carbon\Carbon;
use App\Events\ReportCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = ['updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reportedUser()
    {
        return $this->belongsTo(User::class, 'reported_user_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }

     public function scopeUserExist($query, $reported_user_id)
    {
        return $query->where('user_id', $reported_user_id);
    }
}
