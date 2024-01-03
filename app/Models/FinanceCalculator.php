<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceCalculator extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function loanTerm()
    {
        return $this->belongsTo(LoanTerm::class);
    }
}
