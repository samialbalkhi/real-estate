<?php

use App\Models\RealEstateCategory;
use App\Models\RealEstateType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
            $table->float('width_street');
            $table->integer('number_of_room');
            $table->integer('number_of_hall');
            $table->integer('number_of_bathroom');
            $table->integer('floor_number');
            $table->string('age_of_real_estate');
            $table->integer('number_of_people');
            $table->string('rental_period');
            $table->float('lat');
            $table->float('lng');
            $table->float('price');
            $table->float('space');
            $table->boolean('status');
            $table->boolean('featured');
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
        Schema::dropIfExists('advertisements');
    }
};
