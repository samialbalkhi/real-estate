<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('finance_calculators', function (Blueprint $table) {
            $table->id();
            $table->float('property_value');
            $table->float('down_payment_value');
            $table->float('down_payment_percentage');
            $table->float('loan_value');
            $table->float('product_type');
            $table->string('employment_status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('finance_calculators');
    }
};
