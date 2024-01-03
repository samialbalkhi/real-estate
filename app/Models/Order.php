<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\RealEstateCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function realEstateType()
    {
        return $this->belongsTo(realEstateType::class);
    }

    public function realEstateCategory()
    {
        return $this->belongsTo(RealEstateCategory::class);
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }
}
