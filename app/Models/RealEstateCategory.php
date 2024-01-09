<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstateCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }
}
