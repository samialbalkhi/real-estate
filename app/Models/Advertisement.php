<?php

namespace App\Models;

use App\Models\RealEstateType;
use App\Models\AdvertisingPicture;
use App\Models\RealEstateCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Advertisement extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function realEstateCategories()
    {
        return $this->hasMany(RealEstateCategory::class);
    }

    public function advertisingPictures()
    {
        return $this->hasMany(AdvertisingPicture::class);
    }

    public function realEstateType()
    {
        return $this->belongsTo(RealEstateType::class);
    }

    public function scopeActive($query)
    {
        return $query->whereFeatured(true);
    }

    // public function scopeActive($query)
    // {
    //     return $query->whereStatus(true);
    // }


}
