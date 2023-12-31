<?php

namespace App\Models;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RealEstateCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }
}
