<?php

use App\Models\FinanceCalculator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('loan_terms', function (Blueprint $table) {
            $table->id();
            $table->string('loan_time');             
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_terms');
    }
};
