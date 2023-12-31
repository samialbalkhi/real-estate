<?php

namespace App\Models;

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
}
