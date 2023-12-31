<?php

use App\Models\User;
use App\Models\RealEstateType;
use App\Models\RealEstateCategory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->float('lat');
            $table->float('lng');
            $table->float('highest_price');
            $table->float('lowest_price');
            $table->float('highest_space');
            $table->float('lowest_space');
            $table->foreignIdFor(RealEstateType::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

                $table->foreignIdFor(RealEstateCategory::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
