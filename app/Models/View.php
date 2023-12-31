<?php

namespace App\Models;
use App\Models\User;
use App\Models\Advertisement;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class View extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'advertisement_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
    public function activities()
    {
        return $this->morphMany(\Spatie\Activitylog\Models\Activity::class, 'subject');
    }
}
