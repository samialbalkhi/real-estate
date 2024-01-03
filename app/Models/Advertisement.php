<?php

namespace App\Models;

use App\Models\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advertisement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function realEstateCategory()
    {
        return $this->belongsTo(RealEstateCategory::class);
    }

    public function advertisingPictures()
    {
        return $this->hasMany(AdvertisingPicture::class);
    }

    public function realEstateType()
    {
        return $this->belongsTo(RealEstateType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function scopeFeatured($query)
    {
        return $query->whereFeatured(true);
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }
}
